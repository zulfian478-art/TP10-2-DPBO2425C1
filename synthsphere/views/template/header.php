<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>SynthSphere</title>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#05050a; --panel:#0b0f1a; --neon1:#ff00ff; --neon2:#00eaff; --muted:#9aa3b2;
}
body{ 
    margin:0; font-family: 'Orbitron', sans-serif; 
    background: radial-gradient(circle at 10% 10%, rgba(0,234,255,0.04), transparent 10%), 
                linear-gradient(180deg,#05050a 0%, #0b0f1a 100%); 
    color:#e6eef8; 
}
.container{ 
    max-width:1100px; margin:30px auto; padding:20px; 
    background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); 
    border-radius:12px; box-shadow:0 6px 30px rgba(0,0,0,0.6); 
}
.header{ display:flex; justify-content:space-between; align-items:center; gap:12px; }
.brand{ display:flex; gap:12px; align-items:center; }
.logo{ width:24px; height:24px; border-radius:50%; background:linear-gradient(45deg, var(--neon1), var(--neon2)); }
.nav a { 
    color: var(--neon2); text-decoration: none; padding: 5px 10px; border-radius: 5px;
    transition: background 0.3s;
}
.nav a:hover { background: rgba(0, 234, 255, 0.1); }
.table { width:100%; border-collapse:collapse; margin-top:18px; }
.table th, .table td { padding:10px; border-bottom:1px solid rgba(255,255,255,0.03); text-align:left; color:#dfe9f9; }
.btn { display:inline-block; padding:8px 12px; border-radius:8px; text-decoration:none; background:linear-gradient(90deg,var(--neon1),var(--neon2)); color:#05050a; font-weight:700; cursor:pointer; border:none; }
.btn-ghost{ background:transparent; border:1px solid rgba(255,255,255,0.04); color:var(--neon2); padding:6px 10px; margin-right:6px; text-decoration:none; display:inline-block; border-radius:6px; }
.form-control{ width:100%; padding:8px 10px; border-radius:8px; border:1px solid rgba(255,255,255,0.04); background:transparent; color:#dfe9f9; box-sizing:border-box; margin-bottom:10px; }
.small{ font-size:13px; color:var(--muted); }
.row{ display:flex; gap:12px; }
.col{ flex:1; }
.actions a{ margin-right:6px; }
.h1{ color:var(--neon2); margin:8px 0 6px 0; }
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <div class="brand">
        <div class="logo"></div>
        <h1 class="h1" style="margin:0;">SynthSphere</h1>
    </div>
    <div class="nav">
        <a href="index.php?page=artists">Artists</a>
        <a href="index.php?page=albums">Albums</a>
        <a href="index.php?page=tracks">Tracks</a>
        <a href="index.php?page=instruments">Instruments</a>
        <a href="index.php?page=categories">Categories</a>
    </div>
  </div>
  <hr style="border-color: rgba(255, 255, 255, 0.05); margin-top: 15px; margin-bottom: 15px;">