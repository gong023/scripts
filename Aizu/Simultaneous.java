import java.math.BigDecimal;
public class Simultaneous {
	static double a = 1;static double b = 2;static double c = 3;
	static double d = 4;static double e = 5;static double f = 6;
	public static void main (String[] args) {
		BigDecimal x = new BigDecimal((b*f - e*c) / (b*d - a*e));
		BigDecimal y = new BigDecimal((a*f - d*c) / (a*e - d*b));
		BigDecimal resultX = x.setScale(4,BigDecimal.ROUND_HALF_UP);
		BigDecimal resultY = y.setScale(4,BigDecimal.ROUND_HALF_UP);
		System.out.println(resultX);
		System.out.println(resultY);
	}
}
