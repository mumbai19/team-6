package com.touchinglives.touchinglives;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.webkit.JavascriptInterface;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

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
        wb.addJavascriptInterface(new WebAppInterface(this), "Android");

        wb.setWebViewClient(new WebViewClient() {
            @Override
            public void onPageFinished(WebView view, String url) {
                loadingDialog.dismiss();
                super.onPageFinished(view, url);
            }
        });
//file:///android_asset/noInternetConnection/AboutUs.html

        wb.loadUrl("file:///android_asset/blur.html");

    }

    public class WebAppInterface {
        Context mContext;

        /**
         * Instantiate the interface and set the context
         */
        WebAppInterface(Context c) {
            mContext = c;
        }

        @JavascriptInterface
        public void openProfile() {
            //Toast.makeText(getApplicationContext(), profileUrl, Toast.LENGTH_LONG);
            Intent intent = new Intent(getApplicationContext(), Programs.class);
            intent.putExtra("url", "file:///android_asset/programmer_profile.html");
            startActivity(intent);
        }
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
