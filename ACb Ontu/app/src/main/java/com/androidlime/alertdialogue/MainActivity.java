package com.androidlime.alertdialogue;

import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    Button b;
    EditText nam, pass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        nam = (EditText) findViewById(R.id.name);
        pass = (EditText) findViewById(R.id.password);
        b = (Button) findViewById(R.id.loginbtn);
        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String nameText = nam.getText().toString();
                String passTxt = pass.getText().toString();
                if (nameText.isEmpty()) {
                    Toast.makeText(getApplicationContext(), "please,write your name here", Toast.LENGTH_SHORT).show();
                } else if (passTxt.isEmpty()) {
                    Toast.makeText(getApplicationContext(), "please,give your password here", Toast.LENGTH_SHORT).show();
                } else if (nameText.equals("Aumit") && passTxt.equals("123")) {
                    AlertDialog.Builder myBuilder = new AlertDialog.Builder(MainActivity.this);
                    myBuilder.setTitle("Attention!!!");
                    myBuilder.setMessage("Now,you are going to see something very special.You have to keep it simple");
                    myBuilder.setIcon(R.drawable.a);

                    myBuilder.setPositiveButton("Yes,I agree", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            Toast.makeText(getApplicationContext(), "It's about an ionic bond", Toast.LENGTH_SHORT).show();
                            Intent i = new Intent(MainActivity.this, SecondActivity.class);
                            startActivity(i);

                        }
                    });

                    myBuilder.setNegativeButton("No,I won't", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            Toast.makeText(getApplicationContext(), "Sorry,You aren't allowed here!!", Toast.LENGTH_SHORT).show();
                        }
                    });

                    AlertDialog myDialog = myBuilder.create();
                    myDialog.show();

                } else {
                    Toast.makeText(getApplicationContext(), "Sorry!!You have given something wrong.\n We can't alow you.", Toast.LENGTH_SHORT).show();
                }

            }

        });
    }
}


