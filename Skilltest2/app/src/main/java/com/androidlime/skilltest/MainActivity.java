package com.androidlime.skilltest;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    RadioButton b4;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        b4 = (RadioButton) findViewById(R.id.rdbtn4);

        Intent i = new Intent(MainActivity.this,second.class);
        if(b4.isChecked()){

            Toast.makeText(getApplicationContext(),"Correct Answer! :)",Toast.LENGTH_SHORT).show();

            startActivity(i);


        }

        else {

            Toast.makeText(getApplicationContext(),"Incorrect Answer! :(",Toast.LENGTH_SHORT).show();
            startActivity(i);

        }
    }
}
