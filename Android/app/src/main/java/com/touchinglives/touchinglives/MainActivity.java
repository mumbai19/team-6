package com.touchinglives.touchinglives;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity {

    private WebView wb;
    private Dialog loadingDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        loadingDialog = ProgressDialog.show(this, "Please wait", "Loading...");

        wb = findViewById(R.id.webview);
        wb.getSettings().setJavaScriptEnabled(true);
        wb.setWebViewClient(new WebViewClient() {
            @Override
            public void onPageFinished(WebView view, String url) {
                loadingDialog.dismiss();
                super.onPageFinished(view, url);
            }
        });
//file:///android_asset/noInternetConnection/AboutUs.html

        wb.loadUrl("http://www.github.com");

    }

    @Override
    public void onBackPressed() {

        if (wb.canGoBack()) {
            wb.goBack();
        } else {
            super.onBackPressed();
        }

    }


}
