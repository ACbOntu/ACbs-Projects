package com.androidlime.love;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class MainActivity extends AppCompatActivity {

    EditText a;
    Button nxt;
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        a = (EditText)findViewById(R.id.input);
        nxt = (Button)findViewById(R.id.btn);
        nxt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               if(a.getText().toString().equals("4")){
                   Intent i = new Intent(MainActivity.this,second.class);
                   startActivity(i);
               }
            }
        });


    }
}
