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
public class ChangeStatus {

    @GetMapping(value = "/changeStatus")
    public String handleIncomingTransfers(HttpServletRequest request) {


        Connection conn = Database.getConnection();
    PreparedStatement pstmt;
    RestTemplate restTemplate = new RestTemplate();
    String response = restTemplate.getForObject(Database.getIncomingTransferURL(), String.class);
    JSONObject json = new JSONObject(response);
    JSONArray ja = json.getJSONArray("");
        for (int i = 0; i < ja.length(); i++) {
        JSONObject ob = ja.getJSONObject(i);

        int id = ob.getInt("id");
        int id_status = ob.getInt("id_status");

        try {
            pstmt = conn.prepareStatement("UPDATE historia SET id_status=? WHERE id =?;");
            pstmt.setInt(1, id_status);
            pstmt.setInt(2, id);

            pstmt.executeUpdate();
        } catch (SQLException throwables) {
            throwables.printStackTrace();
        }
    }


        return "nh";
}

}
