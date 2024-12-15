function downloadFile() {
    const link = document.createElement('a');
    link.href = 'Miniko Ui V1.mcpack'; // ใส่ URL ของไฟล์ที่ต้องการดาวน์โหลด
    link.download = 'Miniko Ui V1.mcpack'; // ชื่อไฟล์ที่จะถูกดาวน์โหลด
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
