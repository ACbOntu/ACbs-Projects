package com.androidlime.alertdialogue;

import android.content.Intent;
import android.graphics.Typeface;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class SecondActivity extends AppCompatActivity {



    TextView ami,baba,mom;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);

        ami = (TextView) findViewById(R.id.aumit);
        baba = (TextView) findViewById(R.id.baba);
        mom = (TextView) findViewById(R.id.ma);
        ami.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent a = new Intent(SecondActivity.this,Aumit.class);
                startActivity(a);
            }
        });

        baba.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent b = new Intent(SecondActivity.this,baba.class);
                startActivity(b);
            }
        });

        mom.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent c = new Intent(SecondActivity.this,ma.class);
                startActivity(c);
            }
        });
    }
}
