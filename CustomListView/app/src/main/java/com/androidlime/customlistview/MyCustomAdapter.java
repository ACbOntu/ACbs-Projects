package com.androidlime.customlistview;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

/**
 * Created by Aumit on 1/30/2017.
 */

public class MyCustomAdapter extends BaseAdapter {
    String[] namesz;
    int[] imsz;
    Context ct;
    private  static LayoutInflater  inflater = null;

    public  MyCustomAdapter(MainActivity mainact,String[] nameofos,int[] familyms){

        namesz = nameofos;
        ct = mainact;
        imsz = familyms;
        inflater = (LayoutInflater) ct.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
    }

    public int getCount() {
        return namesz.length;
    }

    @Override
    public Object getItem(int position) {
        return position;
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    public  class MyHolder {
        TextView tvs;
        ImageView ims;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {


        MyHolder myh = new MyHolder();
        View myView;
        myView = inflater.inflate(R.layout.custom_layout,null);



        return null;
    }
}
