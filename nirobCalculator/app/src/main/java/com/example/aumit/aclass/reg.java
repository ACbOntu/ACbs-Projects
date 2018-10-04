package com.example.aumit.aclass;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class reg extends AppCompatActivity {

    EditText n,p;
    Button r;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reg);

        n = (EditText) findViewById(R.id.rname);
        p = (EditText) findViewById(R.id.rpass);
        r = (Button) findViewById(R.id.reg);


       r.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View v) {

               SharedPreferences sa = getSharedPreferences("MyData", Context.MODE_PRIVATE);
               SharedPreferences.Editor editor = sa.edit();
               editor.putString("name",n.getText().toString());
               editor.putString("password",p.getText().toString());
               editor.commit();
               Toast.makeText(getApplicationContext(),"Registration successful !",Toast.LENGTH_SHORT).show();
               Intent i = new Intent(reg.this,MainActivity.class);
               startActivity(i);


           }
       });




    }
}
