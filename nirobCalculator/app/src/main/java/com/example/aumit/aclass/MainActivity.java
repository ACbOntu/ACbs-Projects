package com.example.aumit.aclass;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.nfc.Tag;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    Button a,b;
    EditText c;
    TextView d;
    public static final String Default = "No data has been entered";
    @Override
    protected void onCreate(final Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        a = (Button) findViewById(R.id.log);
        b = (Button) findViewById(R.id.r);
        c = (EditText) findViewById(R.id.name);
        d = (TextView) findViewById(R.id.pass);

        a.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String nam = c.getText().toString();
                String p = d.getText().toString();
                SharedPreferences sa = getSharedPreferences("MyData", Context.MODE_PRIVATE);
                String name = sa.getString("name", Default);
                String pass = sa.getString("password", Default);

                if (name.equals(Default) || pass.equals(Default)) {
                    Toast.makeText(getApplicationContext(), "No data was found", Toast.LENGTH_SHORT).show();
                }

                else if (nam.equals(name) && p.equals(pass)){

                    Intent k = new Intent(MainActivity.this,calculator.class);
                    startActivity(k);

                }

            }
        });


        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent j = new Intent(MainActivity.this,reg.class);
                startActivity(j);

            }
        });

            }
        }


