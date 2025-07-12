const table = document.getElementById("itemTable");

items.forEach((item, index) => {
  const row = document.createElement("tr");
  row.innerHTML = `
    <td>${item.title}</td>
    <td>${item.uploader}</td>
    <td>${item.description}</td>
    <td>${item.category}</td>
    <td>${item.status}</td>
    <td>
      <button class="action-btn approve" onclick="approve(${index})">Approve</button>
      <button class="action-btn reject" onclick="reject(${index})">Reject</button>
      <button class="action-btn delete" onclick="remove(${index})">Delete</button>
    </td>
  `;
  table.appendChild(row);
});

function approve(i) {
  alert(`Item "${items[i].title}" approved.`);
}
function reject(i) {
  alert(`Item "${items[i].title}" rejected.`);
}
function remove(i) {
  alert(`Item "${items[i].title}" deleted.`);
}
