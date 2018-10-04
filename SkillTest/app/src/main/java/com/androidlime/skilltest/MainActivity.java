package com.androidlime.skilltest;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.CountDownTimer;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import android.widget.VideoView;

import java.net.URI;

import static com.androidlime.skilltest.R.styleable.AlertDialog;


public class MainActivity extends AppCompatActivity {

    public static int result = 0;
    Button b,r;
    EditText name,password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        name = (EditText) findViewById(R.id.name);
        password = (EditText) findViewById(R.id.pass);
        b = (Button) findViewById(R.id.start);
        r = (Button) findViewById(R.id.reg);

        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                SharedPreferences share = getSharedPreferences("Registration", Context.MODE_PRIVATE);

                String n = share.getString("name","No name found");
                String p = share.getString("password","No password found");


                if(name.getText().toString().equals(n) && password.getText().toString().equals(p))
                {

                    AlertDialog.Builder builder = new  AlertDialog.Builder(MainActivity.this);
                    builder.setMessage("আপনার পাসওয়ার্ড মিলেছে। আপনি কি প্রবেশ করবেন ?");
                    builder.setPositiveButton("হ্যাঁ", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            Toast.makeText(getApplicationContext()," প্রিয় "+name.getText().toString()+ ",\nআপনার পরীক্ষা এখন শুরু হল...\nBest of luck",Toast.LENGTH_SHORT).show();

                            Intent i = new Intent(MainActivity.this,Second.class);
                            startActivity(i);
                        }
                    });

                    builder.setNegativeButton("না", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {

                          dialog.cancel();
                        }
                    });


                    builder.show();

                }

            }
        });

        r.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent p = new Intent(MainActivity.this,Reg.class);
                startActivity(p);
            }
        });

    }
}
