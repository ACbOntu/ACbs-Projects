package com.androidlime.birthdays;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class birthdays extends AppCompatActivity {

    TextView tv;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_birthdays);

        tv = (TextView) findViewById(R.id.showData);
        myDbFunctions mf = new myDbFunctions(getApplicationContext());
        String[] data = mf.mydata();

        String s= "";
        for (int i=0;i<data.length;i++){
            s= s +data[i]+"\n\n";
        }
        tv.setText(s);
    }
}
