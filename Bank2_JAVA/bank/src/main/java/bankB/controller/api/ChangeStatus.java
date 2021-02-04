package bankB.controller.api;

import bankB.Database;
import org.json.JSONArray;
import org.json.JSONObject;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.client.RestTemplate;

import java.sql.Connection;
import java.sql.PreparedStatement;

@RestController
public class ChangeStatus {
/*
    Connection conn = Database.getConnection();
    PreparedStatement pstmt;
    RestTemplate restTemplate = new RestTemplate();
    String response = restTemplate.getForObject(Database.getIncomingTransferURL(), String.class);
    JSONObject json = new JSONObject(response);
    JSONArray ja = json.getJSONArray("Przelewy");
        for (int i = 0; i < ja.length(); i++) {
        JSONObject ob = ja.getJSONObject(i);

        String numerZlecajacego = ob.getString("numerZlecajacego");
        String numerOdbiorcy = ob.getString("numerOdbiorcy");
        String tytul = ob.getString("tytul");
        String nazwa = ob.getString("nazwa");
        Double kwota = ob.getDouble("kwota");
        String data = ob.getString("data");

 */
}
