//import Cul_Radius.*;
/*
x1とかを使いまわしたがために継承したけどロジックが同じなわけではないので
デザインパターンとしては良くないと思う
*/
//class Cul_Circumcenter extends Cul_Radius {
//垂直二等分線の交点を求めるクラス
import java.util.*;
class Cul_Circumcenter {
	public static void main (String args[]) {
		Scanner scn = new Scanner(System.in);
		int x1,y1,x2,y2,x3,y3;
		x1 = scn.nextInt();y1 = scn.nextInt();x2 = scn.nextInt();
		y2 = scn.nextInt();x3 = scn.nextInt();y3 = scn.nextInt();
		//垂直二等分線の式を求める
		int[] equation = new int[4];
		equation = cul_line(x1,y1,x2,y2,x3,x3);
		//二直線の交点を求める
		int[] cross_point = new int[2];
		cross_point = cul_point(equation);
	}
	static int[] cul_line (int x1,int y1,int x2,int y2,int x3,int y3) {
		int[] equation_num = new int[4];
		equation_num[0] = (x1-x2) / (y1-y2) * (-1);
		equation_num[1] = y1 - equation_num[0]*x1;
		equation_num[2] = (x1-x3) / (y1-y3) * (-1);
		equation_num[3] = y1 - equation_num[2]*x1;

		return equation_num;
	}
	static int[] cul_point (int equation[]) {
		int[] cross_point_num = new int[2];
		int a = equation[0];int b = equation[1];
		int c = equation[2];int d = equation[3];

		cross_point_num[0] = (d - b) / (a - c);
		cross_point_num[1] = a * cross_point_num[0] + b;

		return cross_point_num;
	}
}

