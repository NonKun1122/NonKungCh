function downloadFile() {
    const link = document.createElement('a');
    link.href = 'MiNiKoUi-V2.1.mcpack'; // ใส่ URL ของไฟล์ที่ต้องการดาวน์โหลด
    link.download = 'MiNiKoUi-V2.1.mcpack'; // ชื่อไฟล์ที่จะถูกดาวน์โหลด
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
