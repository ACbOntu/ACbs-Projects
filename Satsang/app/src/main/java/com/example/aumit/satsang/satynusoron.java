package com.example.aumit.satsang;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import com.github.barteksc.pdfviewer.PDFView;

public class satynusoron extends AppCompatActivity {

    PDFView pdfview;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_satynusoron);

        pdfview = (PDFView) findViewById(R.id.pdfView);
        pdfview.fromAsset("sat.pdf").load();

    }
}
