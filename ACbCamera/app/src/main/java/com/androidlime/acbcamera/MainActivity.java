package com.androidlime.acbcamera;

import android.app.DownloadManager;
import android.content.Intent;
import android.graphics.Bitmap;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

public class MainActivity extends AppCompatActivity {

    Button b;
    int Request_code = 1;
    ImageView img;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        b = (Button) findViewById(R.id.btn);
        img = (ImageView) findViewById(R.id.img);
        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);

                if (i.resolveActivity(getPackageManager()) != null) {
                    startActivityForResult(i, Request_code);
                }
            }
        });
    }

        public void onActivityResult(int requestcode,int resultcode,Intent data){
        if(requestcode==Request_code){
            if(resultcode==RESULT_OK){
                Bundle bundle = new Bundle();
                bundle = data.getExtras();
                Bitmap BMP;
                BMP =  (Bitmap) bundle.get("data");
                img.setImageBitmap(BMP);
            }
        }
    }


    }

