package com.androidlime.skilltest;

import android.content.Intent;
import android.media.MediaPlayer;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class Second extends AppCompatActivity {

    RadioGroup rg1;


    protected void onCreate(Bundle savedInstanceSdtate) {
        super.onCreate(savedInstanceSdtate);
        setContentView(R.layout.activity_second);

        rg1 = (RadioGroup) findViewById(R.id.rdgrp1);
        rg1.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup group, int checkedId) {
                RadioButton r3 = (RadioButton) findViewById(R.id.rdbtn3);
               if(r3.isChecked()){
                   Toast.makeText(getApplicationContext(),"Your answer is Correct!",Toast.LENGTH_SHORT).show();
                   MainActivity.result +=1;
                   MediaPlayer mp = MediaPlayer.create(getApplicationContext(),R.raw.a);
                   mp.start();
                   Intent i = new Intent(Second.this,third.class);
                   startActivity(i);
               }
                else {
                   Toast.makeText(getApplicationContext(),"Your answer is not Correct!",Toast.LENGTH_SHORT).show();

                   Intent i = new Intent(Second.this,third.class);
                   startActivity(i);

               }
            }
        });

    }
}
