package com.example.aumit.satsang;

import android.media.MediaPlayer;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.github.barteksc.pdfviewer.PDFView;
import static com.example.aumit.satsang.R.id.media_actions;

public class Prayer_listening extends AppCompatActivity {

    PDFView pdfview1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_prayer_listening);

        pdfview1 = (PDFView) findViewById(R.id.pdfView1);
        pdfview1.fromAsset("prayer.pdf").load();

    }
}
