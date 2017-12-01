package com.example.bryan.myapplication;

import android.gesture.Gesture;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.GestureDetector;
import android.view.MotionEvent;
import android.view.View;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {
    protected static final String TAG="GestureDetectorMainActivity";
    public GestureDetector WhateverIWant;
    public GestureDetector WhateverIWant2;
    int count = 0;
    int counter = 0;
    int dos = 0;
    int dosCount = 0;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        WhateverIWant = new GestureDetector(this, new GestureDetector.SimpleOnGestureListener() {
            public boolean onSingleTapConfirmed(MotionEvent e){
                count = count+1;
                counter=count%2;
                final TextView text1=(TextView) findViewById(R.id.textView2);
                if(counter == 1){
                    text1.setVisibility(View.VISIBLE);
                }
                else {
                    text1.setVisibility(View.INVISIBLE);
                }

                return true;
            }
            public boolean onDoubleTap(MotionEvent e){
                dosCount = dosCount+1;
                dos = dosCount%2;
                final TextView text1=(TextView) findViewById(R.id.textView3);
                if(dos == 1){
                    text1.setVisibility(View.VISIBLE);
                }
                else {
                    text1.setVisibility(View.INVISIBLE);
                }
                return true;
            }
            public void onLongPress(MotionEvent e) {
                //super.onLongPress(e);
                final TextView text = (TextView) findViewById(R.id.textView4);
                int x = (int)e.getX();
                int y = (int)e.getY();
                text.setX(x);
                text.setY(y);
                text.setVisibility(View.VISIBLE);
                return;
            }
        });
        /*WhateverIWant2 = new GestureDetector(this,new GestureDetector.OnDoubleTapListener() {
            public boolean onDoubleTap(MotionEvent e) {
                dosCount = dosCount + 1;
                dos = dosCount % 2;
                final TextView text = (TextView) findViewById(R.id.textView3);
                if(counter == 1){
                    text.setVisibility(View.VISIBLE);
                }
                else {
                    text.setVisibility(View.INVISIBLE);
                }
                return true;
            }
        });*/
    }
    @Override
    public boolean onTouchEvent(MotionEvent event){
        if(WhateverIWant != null){
            return WhateverIWant.onTouchEvent(event);
        }
        else{
            return super.onTouchEvent(event);
        }
    }
}
