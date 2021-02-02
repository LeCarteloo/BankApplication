package bankB.controller.api;

import bankB.Database;
import org.json.JSONArray;
import org.json.JSONObject;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

@RestController
public class ExternalTransfer {

    @GetMapping(value = "/externalTransfers", produces = {MediaType.APPLICATION_JSON_UTF8_VALUE})
    public String showExternalTransfers() {
        String json = "Brak przelewów";
        try {
            Connection conn = Database.getConnection();
            Statement stmt = conn.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM historia WHERE id_status=2");

            JSONObject jsonObject = new JSONObject();
            JSONArray array = new JSONArray();
            while (rs.next()) {
                JSONObject transfer = new JSONObject();

                transfer.put("id", rs.getInt(1));
                transfer.put("numerPrzychodzacy", rs.getString(2));
                transfer.put("numerWychodzacy", rs.getString(3));
                transfer.put("tytul", rs.getString(4));
                transfer.put("nazwa", rs.getString(5));
                transfer.put("kwota", rs.getDouble(6));
                transfer.put("data", rs.getDate(7).toString());
                transfer.put("id_status", rs.getInt(8));
                array.put(transfer);
            }
            jsonObject.put("Przelewy", array);
            json = jsonObject.toString();

        } catch (SQLException e) {
            e.printStackTrace();
        }
        return json;
    }
}
