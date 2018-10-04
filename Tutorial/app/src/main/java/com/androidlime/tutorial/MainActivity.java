package com.androidlime.tutorial;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    Button b;
    ListView lv;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    b = (Button) findViewById(R.id.mybutton);
      lv=(ListView) findViewById(R.id.lvid);
        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getApplicationContext(),"Clicked on the button,joyguru, & now we are going to second activity....yaaaaa...",Toast.LENGTH_LONG).show();
            Intent a = new Intent(MainActivity.this,secondActivity.class);
                startActivity(a);

            }
        });


        String[] pcs={"Macbook pro","Lenovo","Dell","Asus","Mac mini"};

        ArrayAdapter adapter= new ArrayAdapter(this,R.layout.lvlayout,R.id.txtid,pcs);
        lv.setAdapter(adapter);
    }
}
