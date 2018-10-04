package com.androidlime.skilltest;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Reg extends AppCompatActivity {


    EditText a,b,c;
    Button btn ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reg);
        a = (EditText) findViewById(R.id.rname);
        b = (EditText) findViewById(R.id.remail);
        c = (EditText) findViewById(R.id.rpass);
        btn = (Button) findViewById(R.id.reg);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                SharedPreferences share = getSharedPreferences("Registration", Context.MODE_PRIVATE);
                SharedPreferences.Editor edit = share.edit();

                edit.putString("name",a.getText().toString());
                edit.putString("password",c.getText().toString());
                edit.commit();
                Toast.makeText(getApplicationContext(),"Registration has been completed successfully",Toast.LENGTH_SHORT).show();

                Intent k = new Intent(Reg.this,MainActivity.class);
                startActivity(k);

            }

        });


    }
}
