unit UMenuSurat;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, StdCtrls;

type
  TFMenuSurat = class(TForm)
    Button1: TButton;
    Button2: TButton;
    Button3: TButton;
    Button4: TButton;
    Button5: TButton;
    Button6: TButton;
    procedure Button1Click(Sender: TObject);
    procedure Button2Click(Sender: TObject);
    procedure Button3Click(Sender: TObject);
    procedure Button5Click(Sender: TObject);
    procedure Button6Click(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  FMenuSurat: TFMenuSurat;

implementation

uses USuratMasuk, USuratKeluar, URekapSurat, UNotaDinas, UAgendaRapat;

{$R *.dfm}

procedure TFMenuSurat.Button1Click(Sender: TObject);
begin
  FSuratMasuk.Show;
end;

procedure TFMenuSurat.Button2Click(Sender: TObject);
begin
  FSuratKeluar.Show;
end;

procedure TFMenuSurat.Button3Click(Sender: TObject);
begin
  FRekapSurat.Show;
end;

procedure TFMenuSurat.Button5Click(Sender: TObject);
begin
  FNotaDinas.Show;
end;

procedure TFMenuSurat.Button6Click(Sender: TObject);
begin
  FAgendaRapat.Show;
end;

end.
