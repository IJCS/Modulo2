import mysqlConnection from 'mysql2/promise';

const prop = {
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'grupoTea'
};

export const pool = mysqlConnection.createPool(prop);
