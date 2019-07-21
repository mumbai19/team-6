package com.touchinglives.touchinglives;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.os.Bundle;
import android.view.MenuItem;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;

import com.google.android.material.navigation.NavigationView;

public class Program extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    private WebView wb;
    private Dialog loadingDialog;
    private Toolbar toolbar;
    private String programId;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_program);
        toolbar = findViewById(R.id.toolbar);
        programId = getIntent().getStringExtra("no");
        toolbar.setTitle(programId);
        // Toast.makeText(getApplicationContext(), programId + "", Toast.LENGTH_LONG);

        setSupportActionBar(toolbar);

       /* FloatingActionButton fab = findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });*/
        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        NavigationView navigationView = findViewById(R.id.nav_view);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();
        navigationView.setNavigationItemSelectedListener(this);

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

        wb.loadUrl("file:///android_asset/course_content.html");
        Toast.makeText(getApplicationContext(), programId + "", Toast.LENGTH_LONG);
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else if (wb.canGoBack()) {
            wb.goBack();
        } else {
            super.onBackPressed();
        }
    }

   /* @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.program, menu);
        return true;
    }*/

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }


    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();
        switch (id) {
            case R.id.nav_attendance:
                wb.loadUrl("file:///android_asset/attendance.html");
                toolbar.setTitle("Attendance");
                break;
            case R.id.nav_saving:
                wb.loadUrl("file:///android_asset/savings.html");
                toolbar.setTitle("Saving");
                break;
            case R.id.nav_activity:
                wb.loadUrl("file:///android_asset/activity.html");
                toolbar.setTitle("Activity");
                break;
            case R.id.nav_star_chart:
                wb.loadUrl("file:///android_asset/starchart.html");
                toolbar.setTitle("Star Chart");
                break;
            case R.id.nav_student_details:
                //wb.loadUrl("file:///android_asset/student_details.html");
                wb.loadUrl("http://52.221.248.168/childrenDatabase");
               /* Intent contactIntent = new Intent(ContactsContract.Intents.Insert.ACTION);
                contactIntent.setType(ContactsContract.RawContacts.CONTENT_TYPE);

                contactIntent
                        .putExtra(ContactsContract.Intents.Insert.NAME, "Contact Name")
                        .putExtra(ContactsContract.Intents.Insert.PHONE, "5555555555");

                startActivityForResult(contactIntent, 1);*/
                toolbar.setTitle("Student Details");

                break;
            case R.id.nav_assessment:
                wb.loadUrl("file:///android_asset/assesment.html");
                toolbar.setTitle("Assessment");

                break;
            case R.id.nav_report:
                wb.loadUrl("file:///android_asset/report.html");
                toolbar.setTitle("Report");

                break;
        }

        DrawerLayout drawer = findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
