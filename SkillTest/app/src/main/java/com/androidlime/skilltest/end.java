package com.androidlime.skilltest;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Display;
import android.widget.Toast;

public class end extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_end);

        Toast.makeText(getApplicationContext(),"সময় শেষ !",Toast.LENGTH_SHORT).show();
        Toast.makeText(getApplicationContext(),"You have scored "+MainActivity.result+" points out of 4 points",Toast.LENGTH_SHORT).show();

    }
}
