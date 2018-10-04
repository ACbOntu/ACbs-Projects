package com.androidlime.mycalculator;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    Button sum,dfrnc,mult,div,btn,root;
    EditText in1,in2;
    TextView sh;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        sum = (Button) findViewById(R.id.btnplus);
        dfrnc = (Button) findViewById(R.id.btnminus);
        mult = (Button) findViewById(R.id.btninto);
        div = (Button) findViewById(R.id.btndiv);
        btn = (Button) findViewById(R.id.eqn);
        root = (Button) findViewById(R.id.sqrt);
        in1  = (EditText) findViewById(R.id.input1);
        in2 = (EditText)findViewById(R.id.input2);
        sh = (TextView) findViewById(R.id.show);


        sum.setOnClickListener(new View.OnClickListener() {

            public void onClick(View v) {
                if(in1.getText().toString().isEmpty()){
                    Toast.makeText(getApplicationContext(),"দুঃখিত!,যোগ করা যাবে না।\nআপনি হয়ত ভুলবশত প্রথম সংখ্যাটি দেন নি ।",Toast.LENGTH_SHORT).show();
                }

                if(in2.getText().toString().isEmpty()){
                    Toast.makeText(getApplicationContext(),"দুঃখিত!,যোগ করা যাবে না।\nআপনি হয়ত ভুলবশত দ্বিতীয় সংখ্যাটি দেন নি ।",Toast.LENGTH_SHORT).show();
                }


             Double a = Double.parseDouble(in1.getText().toString());
                Double b = Double.parseDouble(in2.getText().toString());
               Double c = a + b ;
                String r = c.toString();
                sh.setText("ফলাফল = "+r);
            }
        });

        dfrnc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if(in1.getText().toString().isEmpty()){
                    Toast.makeText(getApplicationContext(),"দুঃখিত! বিয়োগ করা যাবে না।\nআপনি হয়ত ভুলবশত প্রথম সংখ্যাটি দেন নি ।",Toast.LENGTH_SHORT).show();
                }

                else if(in2.getText().toString().isEmpty()){
                    Toast.makeText(getApplicationContext(),"দুঃখিত! বিয়োগ করা যাবে না।\nআপনি হয়ত ভুলবশত দ্বিতীয় সংখ্যাটি দেন নি ।",Toast.LENGTH_SHORT).show();
                }


                Double a = Double.parseDouble(in1.getText().toString());
                Double b = Double.parseDouble(in2.getText().toString());
                Double c = a - b ;
                String r = c.toString();
                sh.setText("ফলাফল = "+r);



            }
        });

        mult.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                if(in1.getText().toString().isEmpty()){
                    Toast.makeText(getApplicationContext(),"দুঃখিত! গুণ করা যাবে না।\nআপনি হয়ত ভুলবশত প্রথম সংখ্যাটি দেন নি ।",Toast.LENGTH_SHORT).show();
                }

                if(in2.getText().toString().isEmpty()){
                    Toast.makeText(getApplicationContext(),"দুঃখিত! গুণ করা যাবে না।\nআপনি হয়ত ভুলবশত দ্বিতীয় সংখ্যাটি দেন নি ।",Toast.LENGTH_SHORT).show();
                }


                Double a = Double.parseDouble(in1.getText().toString());
                Double b = Double.parseDouble(in2.getText().toString());
                Double c = a * b ;
                String r = c.toString();
                sh.setText("ফলাফল = "+r);



            }
        });


        div.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if(in1.getText().toString().isEmpty()){
                    Toast.makeText(getApplicationContext(),"দুঃখিত! ভাগ করা যাবে না।\nআপনি হয়ত ভুলবশত প্রথম সংখ্যাটি দেন নি ।",Toast.LENGTH_SHORT).show();
                }

                if(in2.getText().toString().isEmpty()){
                    Toast.makeText(getApplicationContext(),"দুঃখিত! ভাগ করা যাবে না।\nআপনি হয়ত ভুলবশত দ্বিতীয় সংখ্যাটি দেন নি ।",Toast.LENGTH_SHORT).show();
                }


                Double a = Double.parseDouble(in1.getText().toString());
                Double b = Double.parseDouble(in2.getText().toString());
                Double c = a / b ;
                String r = c.toString();
                sh.setText("ফলাফল = "+r);



            }
        });

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(MainActivity.this,equation.class);
                startActivity(i);
            }
        });


        root.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (in1.getText().toString().equals("")){
                    Toast.makeText(MainActivity.this,"A number is needed",Toast.LENGTH_SHORT).show();
                }
                Double a = Double.parseDouble(in1.getText().toString());

                Double c = Math.sqrt(a);
                String r = c.toString();
                sh.setText("নির্ণেয় বর্গ্মূল : "+ r);

            }
        });

    }
}
