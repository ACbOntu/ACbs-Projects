package com.androidlime.skilltest;

import android.content.Intent;
import android.media.MediaPlayer;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class third extends AppCompatActivity {

    RadioGroup rg;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_third);

        rg = (RadioGroup) findViewById(R.id.rdgrp);

        rg.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup group, int checkedId) {
                RadioButton r1 = (RadioButton) findViewById(R.id.rdbtn3);
                Intent i = new Intent(third.this,fourth.class);
                if(r1.isChecked()){
                    Toast.makeText(getApplicationContext(),"Your answer is Correct!",Toast.LENGTH_SHORT).show();
                    MainActivity.result +=1;
                    MediaPlayer mp = MediaPlayer.create(getApplicationContext(),R.raw.a);
                    mp.start();

                    startActivity(i);
                }
                else {
                    Toast.makeText(getApplicationContext(),"Your answer is not Correct!",Toast.LENGTH_SHORT).show();

                    startActivity(i);

                }
            }
        });

    }
}
