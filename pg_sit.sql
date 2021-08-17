--
-- PostgreSQL database dump
--

-- Dumped from database version 10.16
-- Dumped by pg_dump version 10.16

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: backups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.backups (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    date date NOT NULL,
    "time" time(0) without time zone NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.backups OWNER TO postgres;

--
-- Name: backups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.backups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.backups_id_seq OWNER TO postgres;

--
-- Name: backups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.backups_id_seq OWNED BY public.backups.id;


--
-- Name: bitacoras; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bitacoras (
    id bigint NOT NULL,
    id_user integer NOT NULL,
    name_user character varying(255) NOT NULL,
    action character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    ip inet NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.bitacoras OWNER TO postgres;

--
-- Name: bitacoras_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bitacoras_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bitacoras_id_seq OWNER TO postgres;

--
-- Name: bitacoras_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bitacoras_id_seq OWNED BY public.bitacoras.id;


--
-- Name: clientes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.clientes (
    user_id bigint NOT NULL,
    genero character varying(255) NOT NULL,
    nacionalidad character varying(255) NOT NULL,
    estado_civ character varying(255) NOT NULL,
    ocupacion character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.clientes OWNER TO postgres;

--
-- Name: cuentas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cuentas (
    id bigint NOT NULL,
    tipo_cuenta_id bigint NOT NULL,
    cliente_id bigint NOT NULL,
    num_cuenta bigint NOT NULL,
    fecha_apertura date NOT NULL,
    fecha_cierre date,
    saldo double precision NOT NULL,
    retiros_mes integer DEFAULT 0 NOT NULL,
    estado boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.cuentas OWNER TO postgres;

--
-- Name: cuentas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cuentas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cuentas_id_seq OWNER TO postgres;

--
-- Name: cuentas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cuentas_id_seq OWNED BY public.cuentas.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: model_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.model_has_permissions (
    permission_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);


ALTER TABLE public.model_has_permissions OWNER TO postgres;

--
-- Name: model_has_roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.model_has_roles (
    role_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);


ALTER TABLE public.model_has_roles OWNER TO postgres;

--
-- Name: monedas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.monedas (
    id bigint NOT NULL,
    nombre character varying(255) NOT NULL,
    abreviacion character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.monedas OWNER TO postgres;

--
-- Name: monedas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.monedas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.monedas_id_seq OWNER TO postgres;

--
-- Name: monedas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.monedas_id_seq OWNED BY public.monedas.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permissions_id_seq OWNER TO postgres;

--
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- Name: role_has_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.role_has_permissions (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);


ALTER TABLE public.role_has_permissions OWNER TO postgres;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO postgres;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: sucursals; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sucursals (
    id bigint NOT NULL,
    nombre character varying(50) NOT NULL,
    imagen character varying(255) NOT NULL,
    inicio_atencion time(0) without time zone NOT NULL,
    fin_atencion time(0) without time zone NOT NULL,
    codigo integer NOT NULL,
    latitude character varying(255) NOT NULL,
    longitude character varying(255) NOT NULL,
    direccion character varying(255) NOT NULL,
    sitio character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.sucursals OWNER TO postgres;

--
-- Name: sucursals_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sucursals_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sucursals_id_seq OWNER TO postgres;

--
-- Name: sucursals_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sucursals_id_seq OWNED BY public.sucursals.id;


--
-- Name: tipo_cuentas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo_cuentas (
    id bigint NOT NULL,
    nombre character varying(255) NOT NULL,
    imagen character varying(255) NOT NULL,
    descripcion character varying(255) NOT NULL,
    caracteristicas text NOT NULL,
    ventajas text NOT NULL,
    tasa_interes double precision NOT NULL,
    apertura_minima double precision NOT NULL,
    retiros_mes integer DEFAULT 0 NOT NULL,
    estado boolean DEFAULT true NOT NULL,
    moneda_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tipo_cuentas OWNER TO postgres;

--
-- Name: tipo_cuentas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_cuentas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_cuentas_id_seq OWNER TO postgres;

--
-- Name: tipo_cuentas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_cuentas_id_seq OWNED BY public.tipo_cuentas.id;


--
-- Name: transaccions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transaccions (
    id bigint NOT NULL,
    monto double precision NOT NULL,
    fecha date NOT NULL,
    hora time(0) without time zone NOT NULL,
    ci_cliente integer NOT NULL,
    nombre_cliente character varying(255) NOT NULL,
    tipo character varying(255) NOT NULL,
    cod_funcionario integer,
    descripcion character varying(255),
    num_cuenta_destino integer,
    num_cuenta_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT transaccions_tipo_check CHECK (((tipo)::text = ANY ((ARRAY['DEPOSITO'::character varying, 'RETIRO'::character varying, 'TRANSACCION'::character varying])::text[])))
);


ALTER TABLE public.transaccions OWNER TO postgres;

--
-- Name: transaccions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.transaccions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transaccions_id_seq OWNER TO postgres;

--
-- Name: transaccions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.transaccions_id_seq OWNED BY public.transaccions.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    foto character varying(255),
    ci integer NOT NULL,
    codigo integer NOT NULL,
    nombre character varying(255) NOT NULL,
    apellido_pat character varying(255),
    apellido_mat character varying(255),
    fecha_nac date NOT NULL,
    telefono integer NOT NULL,
    direccion character varying(255) NOT NULL,
    latitud character varying(255),
    longitud character varying(255),
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255),
    estado boolean DEFAULT true NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: backups id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.backups ALTER COLUMN id SET DEFAULT nextval('public.backups_id_seq'::regclass);


--
-- Name: bitacoras id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacoras ALTER COLUMN id SET DEFAULT nextval('public.bitacoras_id_seq'::regclass);


--
-- Name: cuentas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuentas ALTER COLUMN id SET DEFAULT nextval('public.cuentas_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: monedas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.monedas ALTER COLUMN id SET DEFAULT nextval('public.monedas_id_seq'::regclass);


--
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Name: sucursals id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sucursals ALTER COLUMN id SET DEFAULT nextval('public.sucursals_id_seq'::regclass);


--
-- Name: tipo_cuentas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_cuentas ALTER COLUMN id SET DEFAULT nextval('public.tipo_cuentas_id_seq'::regclass);


--
-- Name: transaccions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaccions ALTER COLUMN id SET DEFAULT nextval('public.transaccions_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: backups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.backups (id, name, date, "time", created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: bitacoras; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bitacoras (id, id_user, name_user, action, description, ip, created_at, updated_at) FROM stdin;
1	1	ADMIN	crear	se ha creado la cuenta del cliente3	127.0.0.1	2021-08-11 10:08:26	2021-08-11 10:08:26
2	1	ADMIN	crear	se ha creado la cuenta del cliente2	127.0.0.1	2021-08-11 11:07:11	2021-08-11 11:07:11
\.


--
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.clientes (user_id, genero, nacionalidad, estado_civ, ocupacion, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: cuentas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cuentas (id, tipo_cuenta_id, cliente_id, num_cuenta, fecha_apertura, fecha_cierre, saldo, retiros_mes, estado, created_at, updated_at) FROM stdin;
1	1	3	10001234376123958	2021-08-11	\N	15000	0	t	2021-08-11 10:07:55	2021-08-11 10:07:55
2	1	3	10001234927523767	2021-08-11	\N	15000	0	t	2021-08-11 10:08:26	2021-08-11 10:08:26
3	1	2	10001234299465011	2021-08-11	\N	145000	0	t	2021-08-11 11:07:11	2021-08-11 11:07:11
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_07_01_031136_create_permission_tables	1
2	2014_10_12_000000_create_users_table	1
3	2014_10_12_100000_create_password_resets_table	1
4	2019_08_19_000000_create_failed_jobs_table	1
5	2021_07_02_015517_create_sucursals_table	1
6	2021_07_07_170233_create_monedas_table	1
7	2021_07_07_195021_create_tipo_cuentas_table	1
8	2021_07_23_020226_create_clientes_table	2
9	2021_07_24_023335_create_cuentas_table	2
10	2021_07_24_141433_create_transaccions_table	2
11	2021_08_06_190252_create_backups_table	2
12	2021_08_09_151751_create_bitacoras_table	2
\.


--
-- Data for Name: model_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.model_has_permissions (permission_id, model_type, model_id) FROM stdin;
\.


--
-- Data for Name: model_has_roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.model_has_roles (role_id, model_type, model_id) FROM stdin;
1	App\\User	1
2	App\\User	2
2	App\\User	3
\.


--
-- Data for Name: monedas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.monedas (id, nombre, abreviacion, created_at, updated_at) FROM stdin;
1	Boliviano	BOB	2021-08-11 10:05:57	2021-08-11 10:05:57
2	Dolar	DOL	2021-08-11 10:05:57	2021-08-11 10:05:57
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.permissions (id, name, guard_name, created_at, updated_at) FROM stdin;
1	ver dashboard	web	2021-08-11 10:05:56	2021-08-11 10:05:56
2	ver sucursal	web	2021-08-11 10:05:56	2021-08-11 10:05:56
3	crear sucursal	web	2021-08-11 10:05:56	2021-08-11 10:05:56
4	editar sucursal	web	2021-08-11 10:05:56	2021-08-11 10:05:56
5	mostrar sucursal	web	2021-08-11 10:05:56	2021-08-11 10:05:56
6	desactivar sucursal	web	2021-08-11 10:05:56	2021-08-11 10:05:56
7	ver moneda	web	2021-08-11 10:05:56	2021-08-11 10:05:56
8	crear moneda	web	2021-08-11 10:05:56	2021-08-11 10:05:56
9	editar moneda	web	2021-08-11 10:05:56	2021-08-11 10:05:56
10	mostrar moneda	web	2021-08-11 10:05:56	2021-08-11 10:05:56
11	desactivar moneda	web	2021-08-11 10:05:56	2021-08-11 10:05:56
12	ver usuario	web	2021-08-11 10:05:56	2021-08-11 10:05:56
13	crear usuario	web	2021-08-11 10:05:56	2021-08-11 10:05:56
14	editar usuario	web	2021-08-11 10:05:56	2021-08-11 10:05:56
15	mostrar usuario	web	2021-08-11 10:05:56	2021-08-11 10:05:56
16	desactivar usuario	web	2021-08-11 10:05:56	2021-08-11 10:05:56
17	ver permiso	web	2021-08-11 10:05:56	2021-08-11 10:05:56
18	crear permiso	web	2021-08-11 10:05:56	2021-08-11 10:05:56
19	editar permiso	web	2021-08-11 10:05:56	2021-08-11 10:05:56
20	mostrar permiso	web	2021-08-11 10:05:56	2021-08-11 10:05:56
21	desactivar permiso	web	2021-08-11 10:05:56	2021-08-11 10:05:56
22	ver rol	web	2021-08-11 10:05:56	2021-08-11 10:05:56
23	crear rol	web	2021-08-11 10:05:56	2021-08-11 10:05:56
24	editar rol	web	2021-08-11 10:05:56	2021-08-11 10:05:56
25	mostrar rol	web	2021-08-11 10:05:56	2021-08-11 10:05:56
26	desactivar rol	web	2021-08-11 10:05:56	2021-08-11 10:05:56
27	ver tipo cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
28	crear tipo cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
29	editar tipo cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
30	mostrar tipo cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
31	desactivar tipo cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
32	ver cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
33	crear cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
34	editar cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
35	mostrar cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
36	desactivar cuenta	web	2021-08-11 10:05:56	2021-08-11 10:05:56
37	ver cliente	web	2021-08-11 10:05:56	2021-08-11 10:05:56
38	crear cliente	web	2021-08-11 10:05:56	2021-08-11 10:05:56
39	editar cliente	web	2021-08-11 10:05:56	2021-08-11 10:05:56
40	mostrar cliente	web	2021-08-11 10:05:56	2021-08-11 10:05:56
41	desactivar cliente	web	2021-08-11 10:05:56	2021-08-11 10:05:56
42	ver transaccion	web	2021-08-11 10:05:56	2021-08-11 10:05:56
43	crear transaccion	web	2021-08-11 10:05:56	2021-08-11 10:05:56
44	editar transaccion	web	2021-08-11 10:05:56	2021-08-11 10:05:56
45	mostrar transaccion	web	2021-08-11 10:05:56	2021-08-11 10:05:56
46	desactivar transaccion	web	2021-08-11 10:05:56	2021-08-11 10:05:56
47	ver deposito	web	2021-08-11 10:05:56	2021-08-11 10:05:56
48	crear deposito	web	2021-08-11 10:05:56	2021-08-11 10:05:56
49	editar deposito	web	2021-08-11 10:05:56	2021-08-11 10:05:56
50	mostrar deposito	web	2021-08-11 10:05:56	2021-08-11 10:05:56
51	desactivar deposito	web	2021-08-11 10:05:56	2021-08-11 10:05:56
52	ver retiro	web	2021-08-11 10:05:56	2021-08-11 10:05:56
53	crear retiro	web	2021-08-11 10:05:56	2021-08-11 10:05:56
54	editar retiro	web	2021-08-11 10:05:56	2021-08-11 10:05:56
55	mostrar retiro	web	2021-08-11 10:05:56	2021-08-11 10:05:56
56	desactivar retiro	web	2021-08-11 10:05:57	2021-08-11 10:05:57
\.


--
-- Data for Name: role_has_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.role_has_permissions (permission_id, role_id) FROM stdin;
2	1
3	1
4	1
5	1
6	1
7	1
8	1
9	1
10	1
11	1
12	1
13	1
14	1
15	1
16	1
17	1
18	1
19	1
20	1
21	1
22	1
23	1
24	1
25	1
26	1
27	1
28	1
29	1
30	1
31	1
32	1
33	1
34	1
35	1
36	1
37	1
38	1
39	1
40	1
41	1
42	1
43	1
44	1
45	1
46	1
47	1
48	1
49	1
50	1
51	1
52	1
53	1
54	1
55	1
56	1
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (id, name, guard_name, created_at, updated_at) FROM stdin;
1	admin	web	2021-08-11 10:05:56	2021-08-11 10:05:56
2	funcionario	web	2021-08-11 10:05:56	2021-08-11 10:05:56
3	cliente	web	2021-08-11 10:05:56	2021-08-11 10:05:56
\.


--
-- Data for Name: sucursals; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sucursals (id, nombre, imagen, inicio_atencion, fin_atencion, codigo, latitude, longitude, direccion, sitio, created_at, updated_at) FROM stdin;
1	Sucursal 1	1.jpg	08:00:00	16:00:00	1234	-17.793935176396246	-63.17243244926048	Calle 8 Este, Santa Cruz de la Sierra	UV-5	\N	\N
2	Sucursal 2	2.jpg	08:00:00	16:00:00	157	-17.771588685678825	-63.16406116574146	Av. Cañada Pailita o Avenida Paurito, Santa Cruz de la Sierra	UV-18	\N	\N
3	Sucursal 3	3.jpg	08:00:00	16:00:00	4565	-17.761588685678825	-63.15406116574146	Cuellar, Santa Cruz de la Sierra	UV-18	\N	\N
4	Sucursal 4	4.jpg	08:00:00	16:00:00	4560	-17.761588685678825	-63.15406116574146	Av. Irala esquina, Santa Cruz de la Sierra	UV-18	\N	\N
\.


--
-- Data for Name: tipo_cuentas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tipo_cuentas (id, nombre, imagen, descripcion, caracteristicas, ventajas, tasa_interes, apertura_minima, retiros_mes, estado, moneda_id, created_at, updated_at) FROM stdin;
1	CAJA DE AHORROS	caja-de-ahorros.JPG	Es un producto de ahorro, que permite al cliente realizar depósitos y retiros de forma ilimitada, los fondos depositados son de disponibilidad inmediata y generan intereses que son capitalizados mensualmente	Disponible para Personas Naturales y Jurídicas.\n            Sin límite de retiros o depósitos a través de cajas.\n            Sin costo de mantenimiento de cuenta o tarjeta de débito.\n            Disponible en bolivianos y dólares.\n            Puedes abrir tu cuenta de manera individual o colectiva con orden de manejo conjunto o indistinto	Tarjeta de Débito, con la que puedes hacer compras por internet y POS.\n            Acceso a la red más grande del País con más de 190 agencias y más de 440 cajeros automáticos.\n            Manejo de la cuenta y acceso a información de los movimientos a nivel nacional.\n            Contamos con puntos de atención desde las 7 a.m. y nuestras agencias 7 días.\n            Acceso a los servicios de Banca Electrónica UNInet plus y UNImóvil plus las 24 horas del día.\n            Consulta tu saldo y movimientos fácil y sin costo través de nuestra Banca Electrónica UNInet plus, UNImóvil plus y Cajeros Automático.\n            Atención sin hacer filas a través del servicio UNIticket	2	0	0	t	1	2021-08-11 10:05:57	2021-08-11 10:05:57
2	CAJAS DE AHORRO UNIPLUS	Uniplus.JPG	Nuestra cuenta UNIPLUS, es la caja de ahorro que otorga el más alto rendimiento para tus ahorros.	Disponible para Personas Naturales.\n            Máximo de 4 retiros al mes por cualquier canal\n            Disponible en bolivianos y dólares.\n            Puedes abrir tu cuenta de manera individual o colectiva con orden de manejo conjunto o indistinto.\n            Sin costo de mantenimiento de cuenta o tarjeta de débito	Tarjeta de Débito, con la que puedes hacer compras por internet y POS.\n            Acceso a la red más grande del País con más de 190 agencias y más de 440 cajeros automáticos.\n            Contamos con puntos de atención desde las 7 am y nuestras agencias 7 días.\n            Acceso a los servicios de Banca Electrónica UNInet plus y UNImóvil plus.\n            Consulta tu saldo y movimientos fácil y sin costo a través de nuestra Banca Electrónica UNInet plus, UNImóvil plus y Cajeros Automáticos.\n            Atención sin hacer filas a través del servicio UNIticket	3.75	5000	4	t	1	2021-08-11 10:05:57	2021-08-11 10:05:57
\.


--
-- Data for Name: transaccions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.transaccions (id, monto, fecha, hora, ci_cliente, nombre_cliente, tipo, cod_funcionario, descripcion, num_cuenta_destino, num_cuenta_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, foto, ci, codigo, nombre, apellido_pat, apellido_mat, fecha_nac, telefono, direccion, latitud, longitud, email, email_verified_at, password, estado, remember_token, created_at, updated_at) FROM stdin;
1	admin.jpg	0	0	ADMIN	\N	\N	2021-09-01	5487987	los lotes	5487987sdd	5487987sdd	admin@admin.com	\N	$2y$10$0Jv5BtlzorWQBZx4HOfIyu031zbzCfD3gDY7b9scZgHgadGQpKrRO	t	\N	2021-08-11 10:05:57	2021-08-11 10:05:57
2	funcionario1.jpg	9795297	5297	Roxana	Aramayo	Saldias	2021-09-01	5487987	los lotes, av Nuevo Palmar	5487987sdd	5487987sdd	user1@user.com	\N	$2y$10$tN3rwRL2gfrlwycd/Oi6Y.DmMoJFQCMqCDb77AmPCZM6VF3e2/7He	t	\N	2021-08-11 10:05:57	2021-08-11 10:05:57
3	funcionario2.jpg	959784	9698	Damian	Cortez	Mariscal	2021-09-01	5487987	Plan 3000, av Paurito	5487987sdd	5487987sdd	user2@user.com	\N	$2y$10$e/KxOGJRM.Va6PNt6cJ4NuGgML64nYzZPMbFjegq3zVrzFtPr4N.a	t	\N	2021-08-11 10:05:57	2021-08-11 10:05:57
\.


--
-- Name: backups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.backups_id_seq', 1, false);


--
-- Name: bitacoras_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bitacoras_id_seq', 2, true);


--
-- Name: cuentas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cuentas_id_seq', 3, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 12, true);


--
-- Name: monedas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.monedas_id_seq', 2, true);


--
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permissions_id_seq', 56, true);


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_id_seq', 3, true);


--
-- Name: sucursals_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sucursals_id_seq', 4, true);


--
-- Name: tipo_cuentas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_cuentas_id_seq', 2, true);


--
-- Name: transaccions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.transaccions_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 4, true);


--
-- Name: backups backups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.backups
    ADD CONSTRAINT backups_pkey PRIMARY KEY (id);


--
-- Name: bitacoras bitacoras_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacoras
    ADD CONSTRAINT bitacoras_pkey PRIMARY KEY (id);


--
-- Name: cuentas cuentas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuentas
    ADD CONSTRAINT cuentas_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: model_has_permissions model_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_pkey PRIMARY KEY (permission_id, model_id, model_type);


--
-- Name: model_has_roles model_has_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_pkey PRIMARY KEY (role_id, model_id, model_type);


--
-- Name: monedas monedas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.monedas
    ADD CONSTRAINT monedas_pkey PRIMARY KEY (id);


--
-- Name: permissions permissions_name_guard_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_name_guard_name_unique UNIQUE (name, guard_name);


--
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- Name: role_has_permissions role_has_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_pkey PRIMARY KEY (permission_id, role_id);


--
-- Name: roles roles_name_guard_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_guard_name_unique UNIQUE (name, guard_name);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: sucursals sucursals_nombre_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sucursals
    ADD CONSTRAINT sucursals_nombre_unique UNIQUE (nombre);


--
-- Name: sucursals sucursals_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sucursals
    ADD CONSTRAINT sucursals_pkey PRIMARY KEY (id);


--
-- Name: tipo_cuentas tipo_cuentas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_cuentas
    ADD CONSTRAINT tipo_cuentas_pkey PRIMARY KEY (id);


--
-- Name: transaccions transaccions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaccions
    ADD CONSTRAINT transaccions_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: model_has_permissions_model_id_model_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);


--
-- Name: model_has_roles_model_id_model_type_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX model_has_roles_model_id_model_type_index ON public.model_has_roles USING btree (model_id, model_type);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: clientes clientes_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: cuentas cuentas_cliente_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuentas
    ADD CONSTRAINT cuentas_cliente_id_foreign FOREIGN KEY (cliente_id) REFERENCES public.users(id);


--
-- Name: cuentas cuentas_tipo_cuenta_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuentas
    ADD CONSTRAINT cuentas_tipo_cuenta_id_foreign FOREIGN KEY (tipo_cuenta_id) REFERENCES public.tipo_cuentas(id);


--
-- Name: model_has_permissions model_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- Name: model_has_roles model_has_roles_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


--
-- Name: role_has_permissions role_has_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;


--
-- Name: role_has_permissions role_has_permissions_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;


--
-- Name: tipo_cuentas tipo_cuentas_moneda_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo_cuentas
    ADD CONSTRAINT tipo_cuentas_moneda_id_foreign FOREIGN KEY (moneda_id) REFERENCES public.monedas(id);


--
-- Name: transaccions transaccions_num_cuenta_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transaccions
    ADD CONSTRAINT transaccions_num_cuenta_id_foreign FOREIGN KEY (num_cuenta_id) REFERENCES public.cuentas(id);


--
-- PostgreSQL database dump complete
--

