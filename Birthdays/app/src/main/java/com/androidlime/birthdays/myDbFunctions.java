package com.androidlime.birthdays;


import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class myDbFunctions extends SQLiteOpenHelper {

    private static final   String DATABASE_NAME = "mydb";
    private static final String TABLE_NAME = "mytab";
    private static final String TAB_ID = "id";
    private static final String TAB_NAME = "name";
    private static final String TAB_DAYS = "days";


    myDbFunctions(Context c){
        super(c,DATABASE_NAME,null,1);


    }
    public void onCreate(SQLiteDatabase db) {

        String s = "CREATE TABLE" +TAB_NAME +"("+TAB_ID+ "INTEGER PRIMARY KEY,"+TAB_NAME+"TEXT,"+TAB_DAYS+"TEXT)";

        db.execSQL(s);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
    //===----- Adding data--------
    void  addingDataTable(dataTemp dt){

        SQLiteDatabase sql = this.getWritableDatabase();
        ContentValues cv = new ContentValues();
        cv.put(TAB_NAME,dt.getName());
        cv.put(TAB_DAYS,dt.getDay());

        sql.insert(TABLE_NAME,null,cv);
        sql.close();
    }
///---------------showing data---------
    String[] mydata(){
        SQLiteDatabase sq = this.getReadableDatabase();
        String s = "SELECT * FROM"+TABLE_NAME;
        Cursor c = sq.rawQuery(s,null);
        String[] receivedData = new String[c.getCount()];
        if (c.moveToFirst()){
            int counter = 0;
            do {
                receivedData[counter]="Name :" + c.getString(c.getColumnIndex(TAB_NAME+""))+"\nBirthday:" + c.getString(c.getColumnIndex(TAB_DAYS+""));
                counter +=1;

            }while (c.moveToNext());
        }

        return receivedData;
    }

}
