document.addEventListener('DOMContentLoaded', function() {
    // Cek jika jsPDF sudah terdefinisi
    console.log(window.jspdf); // Harus menampilkan objek jsPDF jika terload dengan benar

    const printPDF = document.getElementById('print-pdf');
    if (printPDF) {
        printPDF.addEventListener('click', function() {
            if (window.jspdf) {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();
                
                // Judul laporan
                doc.setFontSize(18);
                doc.setTextColor(139, 90, 43); // Warna primary
                doc.text('LAUDZA BATIK', 105, 20, { align: 'center' });
                
                doc.setFontSize(14);
                doc.setTextColor(0, 0, 0);
                doc.text('Laporan Penjualan', 105, 30, { align: 'center' });
                
                // Data tabel
                const table = document.getElementById('sales-table');
                const rows = table.querySelectorAll('tr');
                const data = [];
                
                // Header
                const headers = [];
                table.querySelectorAll('thead th').forEach(th => {
                    if (th.textContent !== 'Aksi') {
                        headers.push(th.textContent);
                    }
                });
                data.push(headers);
                
                // Isi tabel
                rows.forEach((row, index) => {
                    if (index > 0) {
                        const rowData = [];
                        row.querySelectorAll('td').forEach((td, i) => {
                            if (i < 6) { // Exclude action column
                                rowData.push(td.textContent);
                            }
                        });
                        data.push(rowData);
                    }
                });
                
                // Generate tabel di PDF
                doc.autoTable({
                    head: [data[0]],
                    body: data.slice(1),
                    startY: 40,
                    theme: 'grid',
                    headStyles: {
                        fillColor: [139, 90, 43], // Warna primary
                        textColor: [255, 255, 255],
                        fontStyle: 'bold'
                    },
                    alternateRowStyles: {
                        fillColor: [245, 231, 213] // Warna secondary
                    },
                    styles: {
                        cellPadding: 5,
                        fontSize: 10,
                        valign: 'middle'
                    },
                    didDrawPage: function (data) {
                        // Footer
                        doc.setFontSize(10);
                        doc.setTextColor(100);
                        doc.text('Dicetak pada: ' + new Date().toLocaleDateString(), data.settings.margin.left, doc.internal.pageSize.height - 10);
                    }
                });
                
                // Simpan PDF
                doc.save('Laporan_Penjualan_Laudza_Batik.pdf');
            } else {
                console.log('jsPDF tidak terload!');
            }
        });
    }
});
