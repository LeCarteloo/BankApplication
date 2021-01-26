package bankB.controller;

import bankB.Database;
import bankB.User;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

@Controller
public class MainController {

    @GetMapping("/")
    public String showIndex(Model model) {
        User user = new User();
        model.addAttribute("user", user);

        return "index";
    }

    @GetMapping("/historia")
    public String showForm(@ModelAttribute User user, Model model) {

        model.addAttribute("user", user);

        return "historia";
    }

    @PostMapping("/login")
    public String submitForm(@ModelAttribute("user") User user) {
        try {
            Connection conn = Database.getConnection();
            PreparedStatement pstmt = conn.prepareStatement("SELECT * FROM user WHERE login=? AND password=?");
            pstmt.setString(1, user.getLogin());
            pstmt.setString(2, user.getPassword());

            ResultSet rs = pstmt.executeQuery();
            rs.last();
            if (rs.getRow() == 1) {
                rs.first();
                user.setName(rs.getString(2));
                user.setSurname(rs.getString(3));
                user.setPesel(rs.getString(6));
                user.setEmail(rs.getString(7));
                user.setTelephoneNumber(rs.getString(8));
                user.setLocation(rs.getString(9));
                user.setStreet(rs.getString(10));
                user.setHouseNumber(rs.getString(11));
                user.setPostCode(rs.getString(12));
                user.setBankNumber(rs.getString(13));
                user.setBalance(rs.getDouble(14));
                return "zalogowany";
            }
        }catch(SQLException e){
            e.printStackTrace();
        }
        return "index";
    }

}