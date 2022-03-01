export class SharedAuth
{
    public static readonly mailRegex = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/;
    public static readonly passwordMin = 6;
    public static readonly passwordMax = 120;
    public static readonly nameMin = 4;
    public static readonly nameMax = 10;
    public static readonly nameMinErrorMessage = `名前は${SharedAuth.nameMin}以上にしてください`;
    public static readonly nameMaxErrorMessage = `名前は${SharedAuth.nameMax}以下にしてください`;
    public static readonly mailValidateErrorMessage = "メールアドレスの形式が正しくありません";
    public static readonly passWorldMinErrorMessage = `パスワードは${SharedAuth.passwordMin}以上にしてください`;
    public static readonly passWorldMaxErrorMessage = `パスワードは${SharedAuth.passwordMax}以下にしてください`;
}