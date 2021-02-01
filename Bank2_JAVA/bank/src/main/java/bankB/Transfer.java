package bankB;

import java.util.Date;

public class Transfer {
    private Date data;
    private String tytul;
    private String odbiorca;
    private String nrKonta;
    private double kwota;

    public Date getData() {
        return data;
    }

    public void setData(Date data) {
        this.data = data;
    }

    public String getTytul() {
        return tytul;
    }

    public void setTytul(String tytul) {
        this.tytul = tytul;
    }

    public String getOdbiorca() {
        return odbiorca;
    }

    public void setOdbiorca(String odbiorca) {
        this.odbiorca = odbiorca;
    }

    public String getNrKonta() {
        return nrKonta;
    }

    public void setNrKonta(String nrKonta) {
        this.nrKonta = nrKonta;
    }

    public double getKwota() {
        return kwota;
    }

    public void setKwota(double kwota) {
        this.kwota = kwota;
    }
}
