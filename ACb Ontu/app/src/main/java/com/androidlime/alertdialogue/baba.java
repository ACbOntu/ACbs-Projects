package com.androidlime.alertdialogue;

import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class baba extends AppCompatActivity {

    Button b1,b2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_baba);

        b1 = (Button)findViewById(R.id.callbaba1);
        b2 = (Button) findViewById(R.id.callbaba2);
        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent call_baba = new Intent(Intent.ACTION_CALL);
                call_baba.setData(Uri.parse("tel:01798266981"));
                startActivity(call_baba);
            }
        });
        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent call_baba = new Intent(Intent.ACTION_CALL);
                call_baba.setData(Uri.parse("tel:01632086249"));
                startActivity(call_baba);
            }
        });
    }
}
