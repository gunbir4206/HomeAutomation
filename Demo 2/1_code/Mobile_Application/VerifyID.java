package com.example.aaronchristie.myapplication1;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class VerifyID extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_verify_id);

        final TextView IDVerified = (TextView) findViewById(R.id.tvIDVerified);
    }
}
