package com.androidlime.love;

import android.content.Intent;
import android.media.MediaPlayer;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class second extends AppCompatActivity {

    TextView a;
    Button b;
   public MediaPlayer mySong;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);

        b = (Button) findViewById(R.id.nxt);
        a = (TextView) findViewById(R.id.txt);
        mySong = MediaPlayer.create(second.this,R.raw.a);
        mySong.start();

        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(second.this,third.class);
                startActivity(i);

            }
        });
    }
}
