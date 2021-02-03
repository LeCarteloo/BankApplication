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
public class BankAccounts {

    @GetMapping(value = "/accounts", produces = {MediaType.APPLICATION_JSON_UTF8_VALUE})
    public String showExternalTransfers() {
        String json = "";

        try {
            Connection conn = Database.getConnection();
            Statement stmt = conn.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT bankNumber FROM user");

            JSONObject jsonObject = new JSONObject();
            JSONArray array = new JSONArray();
            while (rs.next()) {
                JSONObject account = new JSONObject();
                account.put("numerBankowy", rs.getString(1));
                array.put(account);
            }
            jsonObject.put("Konta", array);
            json = jsonObject.toString();
        } catch (SQLException throwables) {
            throwables.printStackTrace();
        }
        return json;
    }
}
