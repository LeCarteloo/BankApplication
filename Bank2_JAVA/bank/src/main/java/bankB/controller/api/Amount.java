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
public class Amount {

    @GetMapping(value = "/amount", produces = {MediaType.APPLICATION_JSON_UTF8_VALUE})
    public String showExternalTransfers() {
        String json = "";

        try {
            Connection conn = Database.getConnection();
            Statement stmt = conn.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT balance FROM user");

            JSONObject jsonObject = new JSONObject();
            double amount = 0;
            while (rs.next()) {
                amount += rs.getDouble(1);
            }
            JSONObject sumOfTheAmounts = new JSONObject();
            sumOfTheAmounts.put("sumaSald", amount);
            jsonObject.put("Saldo", sumOfTheAmounts);
            json = jsonObject.toString();
        } catch (SQLException throwables) {
            throwables.printStackTrace();
        }
        return json;
    }
}
