package com.androidlime.alertdialogue;

import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Aumit extends AppCompatActivity {

    Button b;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_aumit);


        b = (Button) findViewById(R.id.callAmit);
        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent make_call = new Intent(Intent.ACTION_CALL);
                make_call.setData(Uri.parse("tel:01733978467"));
                startActivity(make_call);
            }
        });

    }
}
