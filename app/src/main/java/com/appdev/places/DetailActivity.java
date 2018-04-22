package com.appdev.places;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import com.bumptech.glide.Glide;


import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class DetailActivity extends AppCompatActivity {

    int id;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);

        Intent i = getIntent();
        id = i.getIntExtra("id", 1);

        msg(Integer.toString(id));

        getDetail(id);

    }


    public void getDetail(int id){
        String url =getResources().getString(R.string.url) + id + "/";


        RequestQueue queue= Volley.newRequestQueue(this);

        JsonArrayRequest jsonObjectRequest = new JsonArrayRequest
                (Request.Method.GET, url, null, new Response.Listener<JSONArray>() {

                    @Override
                    public void onResponse(JSONArray response) {
                        try {


                            JSONObject jresponse = response.getJSONObject(0);
                            int id = jresponse.getInt("id");
                            String name = jresponse.getString("name");
                            String address = jresponse.getString("address");
                            String description = jresponse.getString("description");
                            String image = jresponse.getString("image");

                            double latitude  = jresponse.getDouble("latitude");
                            double longitude  = jresponse.getDouble("longitude");
                            String coordinates = Double.toString(latitude) + ", " + Double.toString(longitude);

                            TextView name_tv = (TextView)findViewById(R.id.name_tv);
                            name_tv.setText(name);

                            TextView address_tv = (TextView)findViewById(R.id.address_tv);
                            address_tv.setText(address);

                            TextView description_tv = (TextView)findViewById(R.id.description_tv);
                            description_tv.setText(description);

                            TextView coordinates_tv = (TextView)findViewById(R.id.coordinates_tv);
                            coordinates_tv.setText(coordinates);

                            ImageView image_iv = (ImageView)findViewById(R.id.image_iv);

                            Glide
                                    .with(DetailActivity.this)
                                    .load(image)
                                    //.fitCenter()
                                    .into(image_iv);
                            // fresco
                            //draweeView.setImageURI(uri);


                            msg(response.toString());

                        } catch  (JSONException je) {
                            //
                        }


                    }
                }, new Response.ErrorListener() {

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        // TODO: Handle error
                        msg("That didn't work!");

                    }
                });

        queue.add(jsonObjectRequest);
    }



    @Override
    public boolean onSupportNavigateUp(){
        finish();
        return true;
    }

    public void msg(String txt){
        Toast.makeText(this,txt, Toast.LENGTH_LONG).show();
    }
}
