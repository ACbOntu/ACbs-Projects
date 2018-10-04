package com.androidlime.listview;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    ListView lv;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
      lv = (ListView) findViewById(R.id.lvid);


      final String[] familyMember = {"Our family members are   :    ","Ontu Chakrobarti","Osim Chakrobarti", "Onita Rani","Arpita Chakrobarti","Odhir Chakrobarti","Nishit Chakrobarti","ShiShir Chakrobarti",
              "Diganto Chakrobarti","Bristi Chakrobarti","Setu Chakrobarti"};
        ArrayAdapter adapter = new ArrayAdapter(this,R.layout.lvlayout,R.id.txtid,familyMember);

        lv.setAdapter(adapter);

        lv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                Toast.makeText(getApplicationContext(),"Clicked On " + familyMember[position],Toast.LENGTH_SHORT).show();
            }
        });






    }




}
