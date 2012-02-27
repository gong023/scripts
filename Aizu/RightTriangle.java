//美しくない！
//今回は三角形だからいいけど、四角形、五角形と増えていった時に対応できない
//int a,b,cのところを奇麗に書きたい。forとか使いたい
//こんな感じに
//int culArray[] = new int[3];
//for(int a=0;a<=3;a++) {
//	double b = (double)input[i][a];
//	culArray[a] = Math.pow(b,2);
//}
public class RightTriangle {
	static int[][] input = {
		{4,3,5},{4,3,6},{8,8,8}
	};
	public static void main(String[] args) {
		for(int i=0;i<input.length;i++) {
			//念のためソートします
			java.util.Arrays.sort(input[i]);
			int a = input[i][0] * input[i][0];
			int b = input[i][1] * input[i][1];
			int c = input[i][2] * input[i][2];
			if (c==a+b) {
				System.out.println("YES");
			} else {
				System.out.println("NO");
			}
		}
	}
}
