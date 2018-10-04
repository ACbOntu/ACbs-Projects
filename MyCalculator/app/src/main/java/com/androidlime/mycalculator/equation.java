package com.androidlime.mycalculator;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class equation extends AppCompatActivity {


    EditText coefficient1,coefficient2,coefficient3;
    Button viewResult;
    TextView show;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_equation);

        coefficient1 = (EditText) findViewById(R.id.eqn1);
        coefficient2 = (EditText) findViewById(R.id.eqn2);
        coefficient3 = (EditText) findViewById(R.id.eqn3);
        viewResult = (Button)findViewById(R.id.eqnrslt);
        show = (TextView) findViewById(R.id.resultview);

        viewResult.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Double p = Double.parseDouble(coefficient1.getText().toString());
                Double q = Double.parseDouble(coefficient2.getText().toString());
                Double r = Double.parseDouble(coefficient3.getText().toString());

                Double sqr = q * q;
                Double root = Math.sqrt((sqr-(4*p*r)));
                Double s1 = (-q) + root;
                Double s2 = (-q) - root;
                Double f1 = s1/(2*p);
                Double f2 = s2/(2*p);
                String o1 = f1.toString();
                String o2 = f2.toString();
                show.setText(" X =  "+o1 +"\nand X =  "+o2);

            }
        });




    }
}
