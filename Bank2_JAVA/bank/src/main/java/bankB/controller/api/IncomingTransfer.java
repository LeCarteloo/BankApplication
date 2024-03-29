package bankB.controller.api;

import bankB.Database;
import org.json.JSONArray;
import org.json.JSONObject;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.client.RestTemplate;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

@RestController
public class IncomingTransfer {

    @GetMapping(value = "/incomingTransfers")
    public String handleIncomingTransfers(HttpServletRequest request) {


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
            try {
                pstmt = conn.prepareStatement("INSERT INTO historia (numerZlecajacego, numerOdbiorcy, tytul, nazwa, kwota, data, id_status, type) VALUES (?, ?, ?, ?, ?, ?, 1, 'Zewnetrzny');");
                pstmt.setString(1, numerZlecajacego);
                pstmt.setString(2, numerOdbiorcy);
                pstmt.setString(3, tytul);
                pstmt.setString(4, nazwa);
                pstmt.setDouble(5, kwota);
                pstmt.setString(6, data);
                pstmt.executeUpdate();

                pstmt = conn.prepareStatement("SELECT balance FROM user WHERE bankNumber=?");
                pstmt.setString(1, numerOdbiorcy);
                ResultSet rs = pstmt.executeQuery();


                Double obecnaKwota = 0.0;
                rs.last();
                if (rs.getRow() == 1) {
                    obecnaKwota = rs.getDouble(1);
                    rs.first();
                    pstmt = conn.prepareStatement("UPDATE user SET balance=? WHERE bankNumber=?");
                    pstmt.setDouble(1, obecnaKwota + kwota);
                    pstmt.setString(2, numerOdbiorcy);
                    pstmt.executeUpdate();

                }

                HttpSession session = request.getSession(false);
                if (session != null) {
                    pstmt = conn.prepareStatement("SELECT balance FROM user WHERE bankNumber=?");
                    pstmt.setString(1, "PL" + (String) request.getSession().getAttribute("bankNumber"));
                    rs = pstmt.executeQuery();
                    if (rs.next()) {
                        request.getSession().setAttribute("balance", rs.getDouble(1));
                    }
                }


            } catch (SQLException throwables) {
                throwables.printStackTrace();
            }
        }


        return "nh";
    }

}
