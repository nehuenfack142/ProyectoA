package com.duolinco.de;

import android.app.Activity;
import android.os.Bundle;
import android.net.Uri;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.webkit.WebResourceRequest;
import android.webkit.JavascriptInterface;
import android.content.Context;
import android.content.Intent;
import android.content.ActivityNotFoundException;
import android.widget.Toast;
import java.io.*;

public class MainActivity extends Activity {
    private WebView webView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        webView = new WebView(this);
        webView.setBackgroundColor(0xFF111418);
        setContentView(webView);

        WebSettings s = webView.getSettings();
        s.setJavaScriptEnabled(true);
        s.setDomStorageEnabled(true);
        s.setAllowFileAccess(true);
        s.setAllowContentAccess(true);
        s.setLoadWithOverviewMode(true);
        s.setUseWideViewPort(true);

        webView.addJavascriptInterface(new AndroidBridge(this), "Android");
        webView.setWebViewClient(new ExternalAwareClient());
        webView.loadUrl("file:///android_asset/index.html");
    }

    private boolean openExternal(String url) {
        if (url == null || url.isEmpty()) return false;
        try {
            Intent i = new Intent(Intent.ACTION_VIEW, Uri.parse(url));
            i.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
            startActivity(i);
            return true;
        } catch (Exception e) {
            return false;
        }
    }

    private class ExternalAwareClient extends WebViewClient {
        private boolean handle(String url) {
            if (url == null) return false;
            String lower = url.toLowerCase();
            if (lower.startsWith("whatsapp://") ||
                lower.startsWith("https://wa.me/") ||
                lower.startsWith("http://wa.me/") ||
                lower.startsWith("https://api.whatsapp.com/")) {
                return openExternal(url);
            }
            return false;
        }

        @Override
        public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
            Uri u = request.getUrl();
            return handle(u == null ? null : u.toString());
        }

        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            return handle(url);
        }
    }

    public class AndroidBridge {
        private final Context context;
        AndroidBridge(Context c) { context = c; }

        @JavascriptInterface
        public void toast(String message) {
            Toast.makeText(context, message, Toast.LENGTH_SHORT).show();
        }

        @JavascriptInterface
        public String readFile(String path) {
            try {
                File f = new File(context.getFilesDir(), path);
                if (!f.exists()) return "";
                BufferedReader r = new BufferedReader(new InputStreamReader(new FileInputStream(f), "UTF-8"));
                StringBuilder sb = new StringBuilder();
                String line;
                while ((line = r.readLine()) != null) sb.append(line).append("\n");
                r.close();
                return sb.toString();
            } catch (Exception e) { return "ERROR: " + e.getMessage(); }
        }

        @JavascriptInterface
        public boolean writeFile(String path, String content) {
            try {
                File f = new File(context.getFilesDir(), path);
                File parent = f.getParentFile();
                if (parent != null) parent.mkdirs();
                OutputStreamWriter w = new OutputStreamWriter(new FileOutputStream(f), "UTF-8");
                w.write(content);
                w.close();
                return true;
            } catch (Exception e) { return false; }
        }

        @JavascriptInterface
        public boolean openWhatsApp(String phone, String message) {
            try {
                String cleanPhone = phone == null ? "" : phone.replaceAll("[^0-9]", "");
                String text = message == null ? "" : message;
                Uri uri = Uri.parse("whatsapp://send?phone=" + cleanPhone + "&text=" + Uri.encode(text));
                Intent intent = new Intent(Intent.ACTION_VIEW, uri);
                startActivity(intent);
                return true;
            } catch (ActivityNotFoundException e) {
                try {
                    String cleanPhone = phone == null ? "" : phone.replaceAll("[^0-9]", "");
                    String text = message == null ? "" : message;
                    Uri fallback = Uri.parse("https://wa.me/" + cleanPhone + "?text=" + Uri.encode(text));
                    Intent intent2 = new Intent(Intent.ACTION_VIEW, fallback);
                    startActivity(intent2);
                    return true;
                } catch (Exception ex) {
                    Toast.makeText(context, "No pude abrir WhatsApp.", Toast.LENGTH_LONG).show();
                    return false;
                }
            } catch (Exception e) {
                Toast.makeText(context, "No pude abrir WhatsApp.", Toast.LENGTH_LONG).show();
                return false;
            }
        }
    }

    @Override
    public void onBackPressed() {
        if (webView != null && webView.canGoBack()) webView.goBack();
        else super.onBackPressed();
    }
}
