import java.util.*;
public class Cul_Radius {
	public static void main (String args[]) {
		Scanner scn = new Scanner(System.in);
		long x1,y1,x2,y2,x3,y3;
		x1 = (long)scn.nextInt();y1 = (long)scn.nextInt();x2 = (long)scn.nextInt();
		y2 = (long)scn.nextInt();x3 = (long)scn.nextInt();y3 = (long)scn.nextInt();
		long a = mesureLength(x1,y1,x2,y2);
		long b = mesureLength(x2,y2,x3,y3);
		long c = mesureLength(x1,y1,x3,y3);

		double R = a*b*c / Math.sqrt((a+b+c)*(b+c-a)*(a-b+c)*(a+b-c));
		System.out.println((int)Math.round(R));
	}

	//二点間の長さを返す
	static long mesureLength (long x1,long y1,long x2,long y2) {
		long length_a = (long)Math.pow(Math.abs(x1 - x2),2);
		long length_b = (long)Math.pow(Math.abs(x1 - x2),2);
		return length_a + length_b;
	}
}
