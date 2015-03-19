--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: codperfil; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN codperfil AS integer NOT NULL;


ALTER DOMAIN public.codperfil OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = true;

--
-- Name: actas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE actas (
    numero_acta integer NOT NULL,
    nombre_comite text,
    descrip_acta text,
    fecha_acta date,
    year character(4) NOT NULL,
    lugar character(50),
    hora character(10),
    tipo character(20),
    estado character(20),
    codprograma integer NOT NULL,
    orden_del_dia1 text,
    orden_del_dia2 text,
    orden_del_dia3 text,
    orden_del_dia4 text,
    orden_del_dia5 text,
    orden_del_dia6 text,
    orden_del_dia7 text,
    orden_del_dia8 text,
    orden_del_dia9 text,
    orden_del_dia10 text,
    orden_del_dia11 text,
    orden_del_dia12 text,
    nombre_area_complementaria text,
    ced_area_complementaria bigint,
    nombre_area_profesional text,
    ced_area_profesional bigint,
    nombre_director_programa text,
    ced_director_programa bigint,
    nombre_area_basicas text,
    ced_area_basicas bigint,
    nombre_area_profundizacion text,
    ced_area_profundizacion bigint,
    nombre_estudiantes text,
    ced_estudiantes bigint,
    nombre_invitado text,
    ced_invitado bigint,
    archivo text
);


ALTER TABLE public.actas OWNER TO postgres;

--
-- Name: areas_inv_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE areas_inv_codigo_seq
    START WITH 18
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.areas_inv_codigo_seq OWNER TO postgres;

SET default_with_oids = false;

--
-- Name: areas_inv; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE areas_inv (
    nombre character(50) NOT NULL,
    codigo integer DEFAULT nextval('areas_inv_codigo_seq'::regclass) NOT NULL
);


ALTER TABLE public.areas_inv OWNER TO postgres;

--
-- Name: asignacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE asignacion (
    codhorario character(3) NOT NULL,
    cedula bigint NOT NULL,
    motivo character(45),
    fecha date NOT NULL,
    codubicacion integer NOT NULL
);


ALTER TABLE public.asignacion OWNER TO postgres;

--
-- Name: TABLE asignacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE asignacion IS 'Almacena las horas en que esta ocupada cada una de las salas';


--
-- Name: COLUMN asignacion.codhorario; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN asignacion.codhorario IS 'Código del horario, con el se averiguan el día y la hora
';


--
-- Name: COLUMN asignacion.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN asignacion.cedula IS 'Cédula de quien solicita la sala, si es para una clase, el solicitante será el docente
';


--
-- Name: COLUMN asignacion.motivo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN asignacion.motivo IS 'Motivo por el cual es solicitada la sala 
';


--
-- Name: COLUMN asignacion.fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN asignacion.fecha IS 'Fecha exacta en que la sala ha sido asignada. Si la fecha es 0000-00-00 indica que la sala será asignada todo el semestre con el motivo indicado
';


--
-- Name: COLUMN asignacion.codubicacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN asignacion.codubicacion IS 'Indica la sala asignada
';


SET default_with_oids = true;

--
-- Name: avances; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE avances (
    cod_proyecto character(6) NOT NULL,
    cod_avance integer NOT NULL,
    fecha_avance date NOT NULL,
    archivo_avance bytea
);


ALTER TABLE public.avances OWNER TO postgres;

SET default_with_oids = false;

--
-- Name: boletin; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE boletin (
    cod_bol integer NOT NULL,
    titulo_bol text NOT NULL,
    fecha_bol text NOT NULL,
    resumen text NOT NULL,
    key_word_bol text NOT NULL,
    texto_bol text NOT NULL,
    url_imagen_bol text,
    id_usua bigint NOT NULL
);


ALTER TABLE public.boletin OWNER TO postgres;

SET default_with_oids = true;

--
-- Name: campos_preguntas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE campos_preguntas (
    cod_formato integer NOT NULL,
    cod_pregunta integer NOT NULL,
    cod_campo integer NOT NULL,
    descrip_campo character(200)
);


ALTER TABLE public.campos_preguntas OWNER TO postgres;

SET default_with_oids = false;

--
-- Name: cargo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cargo (
    codcargo integer NOT NULL,
    desccargo text,
    horas_cargo integer,
    coddependencia integer NOT NULL,
    cantidad integer,
    nombrecargo character(50) NOT NULL
);


ALTER TABLE public.cargo OWNER TO postgres;

--
-- Name: TABLE cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE cargo IS 'Almacena el nombre y la descripcion de cada uno de los cargos existentes en la facultad de ciencias Básicas e Ingeniería';


--
-- Name: COLUMN cargo.codcargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cargo.codcargo IS 'Código de los cargos de la facultad
';


--
-- Name: COLUMN cargo.desccargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cargo.desccargo IS 'Descripción del cargo
';


SET default_with_oids = true;

--
-- Name: carpeta_proyecto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE carpeta_proyecto (
    cod_proyecto character(6) NOT NULL,
    cod_archivo integer NOT NULL,
    detalle_archivo character(100),
    carpeta_archivo character(100)
);


ALTER TABLE public.carpeta_proyecto OWNER TO postgres;

--
-- Name: linea_cod_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE linea_cod_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.linea_cod_seq OWNER TO postgres;

SET default_with_oids = false;

--
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categoria (
    codigo integer DEFAULT nextval('linea_cod_seq'::regclass) NOT NULL,
    descripcion text NOT NULL,
    hojavida character(1),
    nombre character(100)
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- Name: categoriaubicacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categoriaubicacion (
    categoria integer NOT NULL,
    ubicacion integer NOT NULL
);


ALTER TABLE public.categoriaubicacion OWNER TO postgres;

--
-- Name: clasificados_codclasificado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE clasificados_codclasificado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.clasificados_codclasificado_seq OWNER TO postgres;

--
-- Name: clasificados; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE clasificados (
    codclasificado integer DEFAULT nextval('clasificados_codclasificado_seq'::regclass) NOT NULL,
    tituloclasificado character(100) NOT NULL,
    clasificado text NOT NULL,
    fechaclasificado date NOT NULL,
    cedularesponsable bigint NOT NULL,
    imagen character(100) DEFAULT 0 NOT NULL,
    publicadoen text NOT NULL
);


ALTER TABLE public.clasificados OWNER TO postgres;

--
-- Name: TABLE clasificados; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE clasificados IS 'Almacena clasificados.';


--
-- Name: COLUMN clasificados.codclasificado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN clasificados.codclasificado IS 'Codigo del clasificado.';


--
-- Name: COLUMN clasificados.tituloclasificado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN clasificados.tituloclasificado IS 'Titulo del clasificado.';


--
-- Name: COLUMN clasificados.clasificado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN clasificados.clasificado IS 'Clasificado.';


--
-- Name: COLUMN clasificados.fechaclasificado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN clasificados.fechaclasificado IS 'Fecha de publicacion del clasificado.';


--
-- Name: COLUMN clasificados.cedularesponsable; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN clasificados.cedularesponsable IS 'Numero de cedula del responsable del clasificado.';


--
-- Name: COLUMN clasificados.imagen; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN clasificados.imagen IS 'Imagen o foto del clasificado.';


--
-- Name: convocatorias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE convocatorias (
    titulo text NOT NULL,
    descripcion text NOT NULL,
    documento text NOT NULL,
    imagen text NOT NULL,
    fechacierre date NOT NULL,
    ident integer NOT NULL
);


ALTER TABLE public.convocatorias OWNER TO postgres;

--
-- Name: convocatorias_ident_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE convocatorias_ident_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.convocatorias_ident_seq OWNER TO postgres;

--
-- Name: convocatorias_ident_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE convocatorias_ident_seq OWNED BY convocatorias.ident;


--
-- Name: cursos_admin; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos_admin (
    cedula text NOT NULL,
    nombre text NOT NULL,
    usuario text NOT NULL,
    passw text NOT NULL
);


ALTER TABLE public.cursos_admin OWNER TO postgres;

--
-- Name: cursos_area; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos_area (
    cod_area text NOT NULL,
    nom_area text NOT NULL
);


ALTER TABLE public.cursos_area OWNER TO postgres;

--
-- Name: cursos_extra; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos_extra (
    codigo text NOT NULL,
    nombre text NOT NULL,
    activo smallint NOT NULL,
    nivel text NOT NULL,
    titulo text NOT NULL,
    modalidad text NOT NULL,
    metodologia text NOT NULL,
    duracion text NOT NULL,
    responsable text NOT NULL,
    descripcion text,
    direc text,
    cod_area text NOT NULL
);


ALTER TABLE public.cursos_extra OWNER TO postgres;

--
-- Name: cursos_inscritos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos_inscritos (
    cedula bigint NOT NULL,
    nombre1 text NOT NULL,
    nombre2 text,
    apellido1 text NOT NULL,
    apellido2 text NOT NULL,
    celular text NOT NULL,
    telefono text NOT NULL,
    mail text NOT NULL,
    profesion text NOT NULL,
    fecha text,
    codcurso text NOT NULL
);


ALTER TABLE public.cursos_inscritos OWNER TO postgres;

--
-- Name: cursos_titulo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos_titulo (
    cod_titulo text NOT NULL,
    nom_titulo text NOT NULL
);


ALTER TABLE public.cursos_titulo OWNER TO postgres;

--
-- Name: dadosdebaja_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE dadosdebaja_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dadosdebaja_codigo_seq OWNER TO postgres;

--
-- Name: dadosdebaja; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE dadosdebaja (
    codigo integer DEFAULT nextval('dadosdebaja_codigo_seq'::regclass) NOT NULL,
    codigoelement integer,
    categoria integer,
    fechadebaja date,
    descripcion text
);


ALTER TABLE public.dadosdebaja OWNER TO postgres;

--
-- Name: departamentos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE departamentos (
    id_departamento integer NOT NULL,
    departamento character(40) NOT NULL
);


ALTER TABLE public.departamentos OWNER TO postgres;

--
-- Name: dependencia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE dependencia (
    coddependencia integer NOT NULL,
    nombredependencia character(50) NOT NULL,
    descdependencia text,
    codubicacion integer NOT NULL
);


ALTER TABLE public.dependencia OWNER TO postgres;

--
-- Name: TABLE dependencia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE dependencia IS 'Almacena el nombre y la descripcion de cada una de las dependecias existentes en la facultad de ciencias Básicas e Ingeniería';


--
-- Name: COLUMN dependencia.coddependencia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN dependencia.coddependencia IS 'Código de la dependencia de la facultad
';


--
-- Name: COLUMN dependencia.nombredependencia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN dependencia.nombredependencia IS 'Nombre de la dependencia de la facultad
';


--
-- Name: COLUMN dependencia.descdependencia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN dependencia.descdependencia IS 'Descripcion de la dependencia de la facultad
';


--
-- Name: detalleprestamo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE detalleprestamo (
    codigoparte character(10) NOT NULL,
    cedula bigint NOT NULL,
    fechaentrega date NOT NULL,
    horaentrega time without time zone NOT NULL,
    equipo boolean
);


ALTER TABLE public.detalleprestamo OWNER TO postgres;

--
-- Name: TABLE detalleprestamo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE detalleprestamo IS 'Especifica las partes o equipos prestados';


--
-- Name: disponibilidad_docente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE disponibilidad_docente (
    coddocente integer NOT NULL,
    codhoras character(3) NOT NULL,
    year character(4) NOT NULL,
    periodo character(2) NOT NULL
);


ALTER TABLE public.disponibilidad_docente OWNER TO postgres;

--
-- Name: docente; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE docente (
    coddocente integer NOT NULL,
    cedula bigint NOT NULL,
    codubicacion integer NOT NULL,
    pregrado1 character varying(100) DEFAULT 0,
    uni_preg1 integer,
    ano_preg1 integer,
    pregrado2 character varying(100),
    uni_preg2 integer,
    ano_preg2 integer,
    postgrado1 character varying(100),
    uni_post1 integer,
    ano_post1 integer,
    postgrado2 character varying(100),
    uni_post2 integer,
    ano_post2 integer,
    postgrado3 character varying(100),
    uni_post3 integer,
    ano_post3 integer,
    nivel_post1 character varying(4),
    nivel_post2 character varying(4),
    nivel_post3 character varying(4),
    codtipo_docente character(2),
    estado boolean,
    cvlac text,
    perfil_corto character varying(512)
);


ALTER TABLE public.docente OWNER TO postgres;

--
-- Name: TABLE docente; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE docente IS 'Almacena los datos del docente';


--
-- Name: COLUMN docente.coddocente; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN docente.coddocente IS 'Código interno del docente
';


--
-- Name: COLUMN docente.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN docente.cedula IS 'Cédula del docente
';


--
-- Name: COLUMN docente.pregrado1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN docente.pregrado1 IS 'titutlo de pregrado';


--
-- Name: COLUMN docente.nivel_post1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN docente.nivel_post1 IS 'Nivel de postgrado (Maestria, especialización, Doctorado)';


--
-- Name: docenteMateria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "docenteMateria" (
    coddocente integer NOT NULL,
    codmateria integer NOT NULL,
    year character(4) NOT NULL,
    periodo character(2) NOT NULL,
    horas_teoricas integer NOT NULL,
    horas_practicas integer NOT NULL,
    seguimiento_asesoria numeric NOT NULL,
    horas_preparacion numeric NOT NULL,
    horas_total numeric NOT NULL,
    codgrupo character(2) NOT NULL
);


ALTER TABLE public."docenteMateria" OWNER TO postgres;

--
-- Name: TABLE "docenteMateria"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "docenteMateria" IS 'Almacena los datos de las mateias asignadas a los docentes';


--
-- Name: COLUMN "docenteMateria".coddocente; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".coddocente IS 'Código del docente
';


--
-- Name: COLUMN "docenteMateria".codmateria; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".codmateria IS 'Código de la materia asignada al docente
';


--
-- Name: COLUMN "docenteMateria".year; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".year IS 'Año en el que la materia fue asignada al docente
';


--
-- Name: COLUMN "docenteMateria".periodo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".periodo IS 'periodo en el que fue asignada la materia al docente';


--
-- Name: COLUMN "docenteMateria".horas_teoricas; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".horas_teoricas IS 'horas teoricas asignadas al docente';


--
-- Name: COLUMN "docenteMateria".horas_practicas; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".horas_practicas IS 'horas practicas asignadas al docente';


--
-- Name: COLUMN "docenteMateria".seguimiento_asesoria; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".seguimiento_asesoria IS 'horas de seguimiento asesoria asignadas al docente';


--
-- Name: COLUMN "docenteMateria".horas_preparacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".horas_preparacion IS 'horas de  preparacion asignadas al docente';


--
-- Name: COLUMN "docenteMateria".horas_total; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".horas_total IS 'total de horas de la materia asigandas al docente';


--
-- Name: COLUMN "docenteMateria".codgrupo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "docenteMateria".codgrupo IS 'codigo del grupo de la materia';


--
-- Name: elementoshoja_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE elementoshoja_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.elementoshoja_codigo_seq OWNER TO postgres;

--
-- Name: elementoshoja; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE elementoshoja (
    codigo integer DEFAULT nextval('elementoshoja_codigo_seq'::regclass) NOT NULL,
    categoria integer NOT NULL,
    ubicacion integer NOT NULL,
    marca character(50),
    nombre character(50),
    modelo character(50),
    serie character(50),
    fechadecompra date,
    valor integer,
    tiempofinaldegarantia date,
    estado integer,
    tipoinv integer,
    tipdoc integer,
    tippro integer,
    observaciones text,
    tipo_frecuencia integer,
    cantidad_horas integer
);


ALTER TABLE public.elementoshoja OWNER TO postgres;

--
-- Name: elementosinhoja_codigo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE elementosinhoja_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.elementosinhoja_codigo_seq OWNER TO postgres;

--
-- Name: elementosinhoja; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE elementosinhoja (
    codigo integer DEFAULT nextval('elementosinhoja_codigo_seq'::regclass) NOT NULL,
    categoria integer DEFAULT 0 NOT NULL,
    ubicacion integer DEFAULT 0 NOT NULL,
    fechaingreso date NOT NULL,
    cantidad integer NOT NULL,
    valor_unitario double precision NOT NULL,
    referencia character(100),
    buenos integer DEFAULT 0,
    malos integer DEFAULT 0,
    regulares integer DEFAULT 0,
    nombre character(100) NOT NULL,
    cantidaddebaja integer DEFAULT 0
);


ALTER TABLE public.elementosinhoja OWNER TO postgres;

SET default_with_oids = true;

--
-- Name: empresa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE empresa (
    nit integer NOT NULL,
    representante_legal character(50),
    razon_social character(200),
    direccion_empresa character(100),
    telefono_empresa character(10),
    email_contacto character(20)
);


ALTER TABLE public.empresa OWNER TO postgres;

--
-- Name: encuestas_id_seq1; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE encuestas_id_seq1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.encuestas_id_seq1 OWNER TO postgres;

SET default_with_oids = false;

--
-- Name: encuestas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE encuestas (
    id integer DEFAULT nextval('encuestas_id_seq1'::regclass) NOT NULL,
    titulo character(200) NOT NULL,
    fecha timestamp without time zone NOT NULL,
    publicadopor bigint NOT NULL,
    activa character(5) DEFAULT 0 NOT NULL,
    tipo character(20) DEFAULT 0 NOT NULL
);


ALTER TABLE public.encuestas OWNER TO postgres;

--
-- Name: TABLE encuestas; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE encuestas IS 'Almacena las Encuestas de la Facultad de Ciencias Básicas';


--
-- Name: COLUMN encuestas.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN encuestas.id IS 'Identificador de la encuesta.';


--
-- Name: COLUMN encuestas.titulo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN encuestas.titulo IS 'Titulo de la enuesta.';


--
-- Name: COLUMN encuestas.fecha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN encuestas.fecha IS 'Fecha de publicacion de la encuesta.';


--
-- Name: COLUMN encuestas.publicadopor; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN encuestas.publicadopor IS 'Cedula de la persona que publicó la encuesta.';


--
-- Name: encuestas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE encuestas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.encuestas_id_seq OWNER TO postgres;

--
-- Name: enlaces_idenlace_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE enlaces_idenlace_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.enlaces_idenlace_seq OWNER TO postgres;

--
-- Name: enlaces; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE enlaces (
    idenlace integer DEFAULT nextval('enlaces_idenlace_seq'::regclass) NOT NULL,
    enlace text NOT NULL,
    destino text NOT NULL,
    publicadopor bigint NOT NULL
);


ALTER TABLE public.enlaces OWNER TO postgres;

--
-- Name: TABLE enlaces; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE enlaces IS 'Almacena los enlaces a otros sitios web diferentes al portal de la F.C.B.I';


--
-- Name: COLUMN enlaces.idenlace; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN enlaces.idenlace IS 'Identificador del enlace.';


--
-- Name: COLUMN enlaces.enlace; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN enlaces.enlace IS 'Nombre del enlace.';


--
-- Name: COLUMN enlaces.destino; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN enlaces.destino IS 'URL destino del enlace.';


--
-- Name: COLUMN enlaces.publicadopor; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN enlaces.publicadopor IS 'Cedula de la persona que publica el enlace.';


--
-- Name: equipo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE equipo (
    nombreequipo character(50),
    codubicacion integer NOT NULL,
    ip inet NOT NULL,
    dirmac character(17) NOT NULL,
    codequipo character(20) NOT NULL,
    obsequipo text
);


ALTER TABLE public.equipo OWNER TO postgres;

--
-- Name: TABLE equipo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE equipo IS 'Almacena los datos de los equipos pertenecientes a la Facultad de Ciencias Básicas e Ingeniería';


--
-- Name: COLUMN equipo.nombreequipo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN equipo.nombreequipo IS 'Nombre del equipo asignado por el instituto de informática
';


--
-- Name: COLUMN equipo.codubicacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN equipo.codubicacion IS 'Código de la ubicación del equipo
';


--
-- Name: COLUMN equipo.ip; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN equipo.ip IS 'dirección ip del equipo asignada por el Instituto de Informática
';


--
-- Name: COLUMN equipo.dirmac; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN equipo.dirmac IS 'Dirección MAC  del aquipo';


--
-- Name: estudiante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estudiante (
    codestudiante integer NOT NULL,
    cedula bigint NOT NULL,
    mail character(50),
    especialidad character(50),
    otrosestudios character(50),
    edad integer,
    codprograma integer
);


ALTER TABLE public.estudiante OWNER TO postgres;

--
-- Name: TABLE estudiante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE estudiante IS 'Almacena los datos del estudiante ';


--
-- Name: COLUMN estudiante.codestudiante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN estudiante.codestudiante IS 'Código interno del estudiante
';


--
-- Name: COLUMN estudiante.cedula; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN estudiante.cedula IS 'Cédula del estudiante
';


--
-- Name: estudianteMateria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "estudianteMateria" (
    codestudiante integer NOT NULL,
    codmateria integer NOT NULL,
    year character(4) NOT NULL,
    periodo boolean NOT NULL,
    nota numeric(4,3)
);


ALTER TABLE public."estudianteMateria" OWNER TO postgres;

--
-- Name: TABLE "estudianteMateria"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE "estudianteMateria" IS 'Almacena cada una de las materias inscritas de un estudiante en un periodo determinado';


--
-- Name: COLUMN "estudianteMateria".codestudiante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "estudianteMateria".codestudiante IS 'Código del estudiante
';


--
-- Name: COLUMN "estudianteMateria".codmateria; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "estudianteMateria".codmateria IS 'Código de la materia inscrita por el estudiante
';


--
-- Name: COLUMN "estudianteMateria".year; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "estudianteMateria".year IS 'año
';


--
-- Name: COLUMN "estudianteMateria".periodo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "estudianteMateria".periodo IS 'Periodo académico
';


--
-- Name: COLUMN "estudianteMateria".nota; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN "estudianteMateria".nota IS 'Nota definitiva de la materia
';


--
-- Name: evento_codEvento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE "evento_codEvento_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."evento_codEvento_seq" OWNER TO postgres;

--
-- Name: evento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE evento (
    codevento integer DEFAULT nextval('"evento_codEvento_seq"'::regclass) NOT NULL,
    tituloevento character(100) NOT NULL,
    descevento text NOT NULL,
    fechaevento date NOT NULL,
    lugarevento character(50) NOT NULL,
    organizadopor character(45) NOT NULL,
    cedularesponsable bigint NOT NULL,
    url character(100) DEFAULT 0 NOT NULL,
    publicadoen text NOT NULL,
    urlexterno text
);


ALTER TABLE public.evento OWNER TO postgres;

--
-- Name: TABLE evento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE evento IS 'Almacena los eventos publicados en los portales del instituto de informática y de F.C.B.I';


--
-- Name: COLUMN evento.codevento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN evento.codevento IS 'Consecutivo de los eventos publicados
';


--
-- Name: COLUMN evento.tituloevento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN evento.tituloevento IS 'Título del evento';


--
-- Name: COLUMN evento.descevento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN evento.descevento IS 'Descripción del evento';


--
-- Name: COLUMN evento.fechaevento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN evento.fechaevento IS 'Fecha de realización del evento';


--
-- Name: COLUMN evento.lugarevento; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN evento.lugarevento IS 'Lugar de realización del evento';


--
-- Name: COLUMN evento.organizadopor; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN evento.organizadopor IS 'Entidad responsable de la realización del evento';


--
-- Name: COLUMN evento.cedularesponsable; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN evento.cedularesponsable IS 'Cédula de la persona que ingresa los datos del evento';


--
-- Name: COLUMN evento.url; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN evento.url IS 'Imagen o fotografía del Evento.';


--
-- Name: fabricante; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE fabricante (
    codfabricante integer NOT NULL,
    nombrefabricante character(30) NOT NULL
);


ALTER TABLE public.fabricante OWNER TO postgres;

--
-- Name: TABLE fabricante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE fabricante IS 'Almacena los datos de los fabricantes de hardware y software';


--
-- Name: COLUMN fabricante.codfabricante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN fabricante.codfabricante IS 'Código del fabricante
';


--
-- Name: COLUMN fabricante.nombrefabricante; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN fabricante.nombrefabricante IS 'Nombre del fabricante
';


--
-- Name: facultad; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE facultad (
    nombrefacultad character(45) NOT NULL,
    descfacultad text,
    codfacultad integer NOT NULL
);


ALTER TABLE public.facultad OWNER TO postgres;

--
-- Name: inv_convocatorias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_convocatorias (
    numero_convocatoria character varying(50) NOT NULL,
    estado character varying(20) NOT NULL,
    titulo_convocatoria text NOT NULL,
    fecha_apertura date NOT NULL,
    fecha_cierre date NOT NULL,
    cuantia character varying(80) NOT NULL,
    descripcion_convocatoria text NOT NULL,
    email character varying(60) NOT NULL,
    telefono_contacto character varying(20),
    pagina_convocatoria text,
    archivo_convocatoria text,
    archivo_imagen text,
    convocatoria_dirigida text NOT NULL,
    estado1 character(1) DEFAULT 1
);


ALTER TABLE public.inv_convocatorias OWNER TO postgres;

--
-- Name: inv_evento_noticias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_evento_noticias (
    id_evento integer NOT NULL,
    titulo_evento character varying(150) NOT NULL,
    tipo character varying(30) NOT NULL,
    descripcion text NOT NULL,
    enlace_documento text NOT NULL,
    fecha date
);


ALTER TABLE public.inv_evento_noticias OWNER TO postgres;

--
-- Name: inv_evento_noticias_id_evento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_evento_noticias_id_evento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_evento_noticias_id_evento_seq OWNER TO postgres;

--
-- Name: inv_evento_noticias_id_evento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_evento_noticias_id_evento_seq OWNED BY inv_evento_noticias.id_evento;


--
-- Name: inv_financiacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_financiacion (
    id_financiacion integer NOT NULL,
    inv_codigo_proyecto integer NOT NULL,
    inv_nit_empresa integer NOT NULL,
    fecha date,
    valor_financiado character varying(80) NOT NULL,
    descripcion_financiamiento text,
    modo_financiamiento character varying(10) NOT NULL
);


ALTER TABLE public.inv_financiacion OWNER TO postgres;

--
-- Name: inv_financiacion_id_financiacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_financiacion_id_financiacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_financiacion_id_financiacion_seq OWNER TO postgres;

--
-- Name: inv_financiacion_id_financiacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_financiacion_id_financiacion_seq OWNED BY inv_financiacion.id_financiacion;


--
-- Name: inv_grupos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_grupos (
    codigo_grupo integer NOT NULL,
    inv_tipo_grupos integer NOT NULL,
    nombre_grupo text NOT NULL,
    director_grupo character varying(100) NOT NULL,
    inv_unidad_academica integer NOT NULL,
    categoria character varying(30) NOT NULL,
    objetivos text NOT NULL,
    ano_creacion date NOT NULL,
    email character varying(60) NOT NULL,
    telefono character varying(20) NOT NULL,
    direccion_grupo text NOT NULL,
    pagina_web text,
    ruta_afiche text,
    link_gruplac text,
    imagen1 text,
    imagen2 text,
    logo_grupo text NOT NULL,
    estado_activacion character(1) DEFAULT 1
);


ALTER TABLE public.inv_grupos OWNER TO postgres;

--
-- Name: inv_grupos_codigo_grupo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_grupos_codigo_grupo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_grupos_codigo_grupo_seq OWNER TO postgres;

--
-- Name: inv_grupos_codigo_grupo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_grupos_codigo_grupo_seq OWNED BY inv_grupos.codigo_grupo;


--
-- Name: inv_investigadores_externos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_investigadores_externos (
    codinv_ext integer NOT NULL,
    cedula_persona bigint NOT NULL,
    nit integer NOT NULL,
    codperfil integer NOT NULL,
    profesion character varying(100) NOT NULL,
    codconvocatoria integer,
    nombreconvocatoria text,
    numerocontrato character varying(100),
    fecha_inicio date,
    fecha_fin date,
    link_cvlac text NOT NULL
);


ALTER TABLE public.inv_investigadores_externos OWNER TO postgres;

--
-- Name: inv_investigadores_externos_codinv_ext_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_investigadores_externos_codinv_ext_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_investigadores_externos_codinv_ext_seq OWNER TO postgres;

--
-- Name: inv_investigadores_externos_codinv_ext_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_investigadores_externos_codinv_ext_seq OWNED BY inv_investigadores_externos.codinv_ext;


--
-- Name: inv_linea_grupos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_linea_grupos (
    id_linea_grupos integer NOT NULL,
    inv_codigo_grupo integer NOT NULL,
    inv_id_linea integer NOT NULL
);


ALTER TABLE public.inv_linea_grupos OWNER TO postgres;

--
-- Name: inv_linea_grupos_id_linea_grupos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_linea_grupos_id_linea_grupos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_linea_grupos_id_linea_grupos_seq OWNER TO postgres;

--
-- Name: inv_linea_grupos_id_linea_grupos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_linea_grupos_id_linea_grupos_seq OWNED BY inv_linea_grupos.id_linea_grupos;


--
-- Name: inv_lineas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_lineas (
    id_lineas integer NOT NULL,
    inv_unidad_academica integer NOT NULL,
    nombre_linea character varying(100) NOT NULL,
    definicion_linea text,
    coordinador_linea character varying(50) NOT NULL,
    objetivo_estudio text NOT NULL,
    objetivo_linea text,
    ruta_archivo text,
    foto_linea text NOT NULL,
    estado character(1) DEFAULT 1
);


ALTER TABLE public.inv_lineas OWNER TO postgres;

--
-- Name: inv_lineas_id_lineas_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_lineas_id_lineas_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_lineas_id_lineas_seq OWNER TO postgres;

--
-- Name: inv_lineas_id_lineas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_lineas_id_lineas_seq OWNED BY inv_lineas.id_lineas;


--
-- Name: inv_participacion_grupos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_participacion_grupos (
    id_participacion_grupos integer NOT NULL,
    inv_codigo_grupo integer NOT NULL,
    cedula_persona bigint NOT NULL
);


ALTER TABLE public.inv_participacion_grupos OWNER TO postgres;

--
-- Name: inv_participacion_grupos_id_participacion_grupos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_participacion_grupos_id_participacion_grupos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_participacion_grupos_id_participacion_grupos_seq OWNER TO postgres;

--
-- Name: inv_participacion_grupos_id_participacion_grupos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_participacion_grupos_id_participacion_grupos_seq OWNED BY inv_participacion_grupos.id_participacion_grupos;


--
-- Name: inv_participacion_productos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_participacion_productos (
    id_participacion_productos integer NOT NULL,
    inv_codigo_grupo integer,
    inv_codigo_producto integer NOT NULL,
    cedula_persona bigint NOT NULL
);


ALTER TABLE public.inv_participacion_productos OWNER TO postgres;

--
-- Name: inv_participacion_productos_id_participacion_productos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_participacion_productos_id_participacion_productos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_participacion_productos_id_participacion_productos_seq OWNER TO postgres;

--
-- Name: inv_participacion_productos_id_participacion_productos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_participacion_productos_id_participacion_productos_seq OWNED BY inv_participacion_productos.id_participacion_productos;


--
-- Name: inv_participacion_proyectos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_participacion_proyectos (
    id_participacion_proyectos integer NOT NULL,
    tipo_investigador character varying(50),
    inv_codigo_proyecto integer NOT NULL,
    cedula_persona bigint NOT NULL,
    dedicacion_tiempo character varying(10) NOT NULL
);


ALTER TABLE public.inv_participacion_proyectos OWNER TO postgres;

--
-- Name: inv_participacion_proyectos_id_participacion_proyectos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_participacion_proyectos_id_participacion_proyectos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_participacion_proyectos_id_participacion_proyectos_seq OWNER TO postgres;

--
-- Name: inv_participacion_proyectos_id_participacion_proyectos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_participacion_proyectos_id_participacion_proyectos_seq OWNED BY inv_participacion_proyectos.id_participacion_proyectos;


--
-- Name: inv_periodos_academicos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_periodos_academicos (
    codigo_periodo integer NOT NULL,
    ano character varying(4) NOT NULL,
    periodo character varying(2) NOT NULL,
    fecha_inicio date NOT NULL,
    fecha_fin date NOT NULL
);


ALTER TABLE public.inv_periodos_academicos OWNER TO postgres;

--
-- Name: inv_periodos_academicos_codigo_periodo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_periodos_academicos_codigo_periodo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_periodos_academicos_codigo_periodo_seq OWNER TO postgres;

--
-- Name: inv_periodos_academicos_codigo_periodo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_periodos_academicos_codigo_periodo_seq OWNED BY inv_periodos_academicos.codigo_periodo;


--
-- Name: inv_productos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_productos (
    codigo_producto integer NOT NULL,
    inv_codigo_grupo integer NOT NULL,
    inv_id_linea integer NOT NULL,
    inv_subtipo_producto integer NOT NULL,
    inv_nit integer NOT NULL,
    nombre_producto text NOT NULL,
    observaciones_producto text NOT NULL,
    fecha_producto date,
    reconocimiento_producto text,
    observaciones_soporte text,
    soporte_producto text,
    tipo_soporte character varying(100),
    foto_producto text
);


ALTER TABLE public.inv_productos OWNER TO postgres;

--
-- Name: inv_productos_codigo_producto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_productos_codigo_producto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_productos_codigo_producto_seq OWNER TO postgres;

--
-- Name: inv_productos_codigo_producto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_productos_codigo_producto_seq OWNED BY inv_productos.codigo_producto;


--
-- Name: inv_proyectos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_proyectos (
    codigo_proyecto integer NOT NULL,
    inv_numero_convocatoria character varying(50) NOT NULL,
    inv_id_linea integer NOT NULL,
    inv_codigo_grupo integer NOT NULL,
    nombre_proyecto text NOT NULL,
    objetivo_general text NOT NULL,
    archivo_actainicio text,
    archivo_propuesta text,
    informe_final text,
    fecha_proyecto date NOT NULL,
    grupo_auxiliar text,
    estado_proyecto character varying(30) NOT NULL
);


ALTER TABLE public.inv_proyectos OWNER TO postgres;

--
-- Name: inv_proyectos_codigo_proyecto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_proyectos_codigo_proyecto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_proyectos_codigo_proyecto_seq OWNER TO postgres;

--
-- Name: inv_proyectos_codigo_proyecto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_proyectos_codigo_proyecto_seq OWNED BY inv_proyectos.codigo_proyecto;


--
-- Name: inv_sublineas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_sublineas (
    id_sublinea integer NOT NULL,
    inv_id_linea integer NOT NULL,
    nombre_sublinea text NOT NULL,
    estado character varying(30),
    descripcion_sublinea text NOT NULL,
    estado1 character(1) DEFAULT 1
);


ALTER TABLE public.inv_sublineas OWNER TO postgres;

--
-- Name: inv_sublineas_id_sublinea_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_sublineas_id_sublinea_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_sublineas_id_sublinea_seq OWNER TO postgres;

--
-- Name: inv_sublineas_id_sublinea_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_sublineas_id_sublinea_seq OWNED BY inv_sublineas.id_sublinea;


--
-- Name: inv_subtipo_productos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_subtipo_productos (
    id_subtipo_producto integer NOT NULL,
    inv_id_tipo_producto integer NOT NULL,
    nombre_subtipo_producto text NOT NULL,
    descripcion_subtipo_producto text,
    estado character(1) DEFAULT 1
);


ALTER TABLE public.inv_subtipo_productos OWNER TO postgres;

--
-- Name: inv_subtipo_productos_id_subtipo_producto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_subtipo_productos_id_subtipo_producto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_subtipo_productos_id_subtipo_producto_seq OWNER TO postgres;

--
-- Name: inv_subtipo_productos_id_subtipo_producto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_subtipo_productos_id_subtipo_producto_seq OWNED BY inv_subtipo_productos.id_subtipo_producto;


--
-- Name: inv_tipo_grupos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_tipo_grupos (
    id integer NOT NULL,
    tipo_grupo character varying(50) NOT NULL,
    estado character(1) DEFAULT 1
);


ALTER TABLE public.inv_tipo_grupos OWNER TO postgres;

--
-- Name: inv_tipo_grupos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_tipo_grupos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_tipo_grupos_id_seq OWNER TO postgres;

--
-- Name: inv_tipo_grupos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_tipo_grupos_id_seq OWNED BY inv_tipo_grupos.id;


--
-- Name: inv_tipo_productos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_tipo_productos (
    id_tipo_producto integer NOT NULL,
    nombre_tipo_producto text NOT NULL,
    descripcion_producto text,
    estado character(1) DEFAULT 1
);


ALTER TABLE public.inv_tipo_productos OWNER TO postgres;

--
-- Name: inv_tipo_productos_id_tipo_producto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_tipo_productos_id_tipo_producto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_tipo_productos_id_tipo_producto_seq OWNER TO postgres;

--
-- Name: inv_tipo_productos_id_tipo_producto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_tipo_productos_id_tipo_producto_seq OWNED BY inv_tipo_productos.id_tipo_producto;


--
-- Name: inv_unidades_academicas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE inv_unidades_academicas (
    id_unidad integer NOT NULL,
    nombre_unidad character varying(255) NOT NULL,
    inv_cedula_coordinador bigint NOT NULL,
    descripcion text
);


ALTER TABLE public.inv_unidades_academicas OWNER TO postgres;

--
-- Name: inv_unidades_academicas_id_unidad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE inv_unidades_academicas_id_unidad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.inv_unidades_academicas_id_unidad_seq OWNER TO postgres;

--
-- Name: inv_unidades_academicas_id_unidad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE inv_unidades_academicas_id_unidad_seq OWNED BY inv_unidades_academicas.id_unidad;


--
-- Name: perfil; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfil (
    codperfil integer NOT NULL,
    nombreperfil character(30) NOT NULL,
    descperfil text NOT NULL
);


ALTER TABLE public.perfil OWNER TO postgres;

--
-- Name: persona; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE persona (
    cedula bigint NOT NULL,
    nombre1 character varying(15) NOT NULL,
    direccion character(100),
    telefono character(10) DEFAULT 0,
    celular character(10) DEFAULT 0,
    apellido1 character(15) NOT NULL,
    nombre2 character varying(15),
    apellido2 character(15),
    mail character(50),
    clavep character varying(40),
    fecha_perfil timestamp without time zone,
    foto text
);


ALTER TABLE public.persona OWNER TO postgres;

--
-- Name: personaperfil; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE personaperfil (
    codperfil integer NOT NULL,
    cedula bigint NOT NULL,
    clave character(40) NOT NULL,
    username character(20) NOT NULL,
    habilitado boolean NOT NULL,
    tiempoextra integer DEFAULT 0
);


ALTER TABLE public.personaperfil OWNER TO postgres;

--
-- Name: id_evento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_evento_noticias ALTER COLUMN id_evento SET DEFAULT nextval('inv_evento_noticias_id_evento_seq'::regclass);


--
-- Name: id_financiacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_financiacion ALTER COLUMN id_financiacion SET DEFAULT nextval('inv_financiacion_id_financiacion_seq'::regclass);


--
-- Name: codigo_grupo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_grupos ALTER COLUMN codigo_grupo SET DEFAULT nextval('inv_grupos_codigo_grupo_seq'::regclass);


--
-- Name: codinv_ext; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_investigadores_externos ALTER COLUMN codinv_ext SET DEFAULT nextval('inv_investigadores_externos_codinv_ext_seq'::regclass);


--
-- Name: id_linea_grupos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_linea_grupos ALTER COLUMN id_linea_grupos SET DEFAULT nextval('inv_linea_grupos_id_linea_grupos_seq'::regclass);


--
-- Name: id_lineas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_lineas ALTER COLUMN id_lineas SET DEFAULT nextval('inv_lineas_id_lineas_seq'::regclass);


--
-- Name: id_participacion_grupos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_grupos ALTER COLUMN id_participacion_grupos SET DEFAULT nextval('inv_participacion_grupos_id_participacion_grupos_seq'::regclass);


--
-- Name: id_participacion_productos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_productos ALTER COLUMN id_participacion_productos SET DEFAULT nextval('inv_participacion_productos_id_participacion_productos_seq'::regclass);


--
-- Name: id_participacion_proyectos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_proyectos ALTER COLUMN id_participacion_proyectos SET DEFAULT nextval('inv_participacion_proyectos_id_participacion_proyectos_seq'::regclass);


--
-- Name: codigo_periodo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_periodos_academicos ALTER COLUMN codigo_periodo SET DEFAULT nextval('inv_periodos_academicos_codigo_periodo_seq'::regclass);


--
-- Name: codigo_producto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_productos ALTER COLUMN codigo_producto SET DEFAULT nextval('inv_productos_codigo_producto_seq'::regclass);


--
-- Name: codigo_proyecto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_proyectos ALTER COLUMN codigo_proyecto SET DEFAULT nextval('inv_proyectos_codigo_proyecto_seq'::regclass);


--
-- Name: id_sublinea; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_sublineas ALTER COLUMN id_sublinea SET DEFAULT nextval('inv_sublineas_id_sublinea_seq'::regclass);


--
-- Name: id_subtipo_producto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_subtipo_productos ALTER COLUMN id_subtipo_producto SET DEFAULT nextval('inv_subtipo_productos_id_subtipo_producto_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_tipo_grupos ALTER COLUMN id SET DEFAULT nextval('inv_tipo_grupos_id_seq'::regclass);


--
-- Name: id_tipo_producto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_tipo_productos ALTER COLUMN id_tipo_producto SET DEFAULT nextval('inv_tipo_productos_id_tipo_producto_seq'::regclass);


--
-- Name: id_unidad; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_unidades_academicas ALTER COLUMN id_unidad SET DEFAULT nextval('inv_unidades_academicas_id_unidad_seq'::regclass);


--
-- Data for Name: actas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY actas (numero_acta, nombre_comite, descrip_acta, fecha_acta, year, lugar, hora, tipo, estado, codprograma, orden_del_dia1, orden_del_dia2, orden_del_dia3, orden_del_dia4, orden_del_dia5, orden_del_dia6, orden_del_dia7, orden_del_dia8, orden_del_dia9, orden_del_dia10, orden_del_dia11, orden_del_dia12, nombre_area_complementaria, ced_area_complementaria, nombre_area_profesional, ced_area_profesional, nombre_director_programa, ced_director_programa, nombre_area_basicas, ced_area_basicas, nombre_area_profundizacion, ced_area_profundizacion, nombre_estudiantes, ced_estudiantes, nombre_invitado, ced_invitado, archivo) FROM stdin;
\.


--
-- Data for Name: areas_inv; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY areas_inv (nombre, codigo) FROM stdin;
\.


--
-- Name: areas_inv_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('areas_inv_codigo_seq', 18, false);


--
-- Data for Name: asignacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY asignacion (codhorario, cedula, motivo, fecha, codubicacion) FROM stdin;
\.


--
-- Data for Name: avances; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY avances (cod_proyecto, cod_avance, fecha_avance, archivo_avance) FROM stdin;
\.


--
-- Data for Name: boletin; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY boletin (cod_bol, titulo_bol, fecha_bol, resumen, key_word_bol, texto_bol, url_imagen_bol, id_usua) FROM stdin;
\.


--
-- Data for Name: campos_preguntas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY campos_preguntas (cod_formato, cod_pregunta, cod_campo, descrip_campo) FROM stdin;
\.


--
-- Data for Name: cargo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cargo (codcargo, desccargo, horas_cargo, coddependencia, cantidad, nombrecargo) FROM stdin;
\.


--
-- Data for Name: carpeta_proyecto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY carpeta_proyecto (cod_proyecto, cod_archivo, detalle_archivo, carpeta_archivo) FROM stdin;
\.


--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY categoria (codigo, descripcion, hojavida, nombre) FROM stdin;
\.


--
-- Data for Name: categoriaubicacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY categoriaubicacion (categoria, ubicacion) FROM stdin;
\.


--
-- Data for Name: clasificados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY clasificados (codclasificado, tituloclasificado, clasificado, fechaclasificado, cedularesponsable, imagen, publicadoen) FROM stdin;
\.


--
-- Name: clasificados_codclasificado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('clasificados_codclasificado_seq', 8, true);


--
-- Data for Name: convocatorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY convocatorias (titulo, descripcion, documento, imagen, fechacierre, ident) FROM stdin;
\.


--
-- Name: convocatorias_ident_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('convocatorias_ident_seq', 6, true);


--
-- Data for Name: cursos_admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_admin (cedula, nombre, usuario, passw) FROM stdin;
\.


--
-- Data for Name: cursos_area; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_area (cod_area, nom_area) FROM stdin;
\.


--
-- Data for Name: cursos_extra; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_extra (codigo, nombre, activo, nivel, titulo, modalidad, metodologia, duracion, responsable, descripcion, direc, cod_area) FROM stdin;
\.


--
-- Data for Name: cursos_inscritos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_inscritos (cedula, nombre1, nombre2, apellido1, apellido2, celular, telefono, mail, profesion, fecha, codcurso) FROM stdin;
\.


--
-- Data for Name: cursos_titulo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cursos_titulo (cod_titulo, nom_titulo) FROM stdin;
\.


--
-- Data for Name: dadosdebaja; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY dadosdebaja (codigo, codigoelement, categoria, fechadebaja, descripcion) FROM stdin;
\.


--
-- Name: dadosdebaja_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('dadosdebaja_codigo_seq', 1, true);


--
-- Data for Name: departamentos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY departamentos (id_departamento, departamento) FROM stdin;
\.


--
-- Data for Name: dependencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY dependencia (coddependencia, nombredependencia, descdependencia, codubicacion) FROM stdin;
\.


--
-- Data for Name: detalleprestamo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY detalleprestamo (codigoparte, cedula, fechaentrega, horaentrega, equipo) FROM stdin;
\.


--
-- Data for Name: disponibilidad_docente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY disponibilidad_docente (coddocente, codhoras, year, periodo) FROM stdin;
\.


--
-- Data for Name: docente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY docente (coddocente, cedula, codubicacion, pregrado1, uni_preg1, ano_preg1, pregrado2, uni_preg2, ano_preg2, postgrado1, uni_post1, ano_post1, postgrado2, uni_post2, ano_post2, postgrado3, uni_post3, ano_post3, nivel_post1, nivel_post2, nivel_post3, codtipo_docente, estado, cvlac, perfil_corto) FROM stdin;
\.


--
-- Data for Name: docenteMateria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "docenteMateria" (coddocente, codmateria, year, periodo, horas_teoricas, horas_practicas, seguimiento_asesoria, horas_preparacion, horas_total, codgrupo) FROM stdin;
\.


--
-- Data for Name: elementoshoja; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY elementoshoja (codigo, categoria, ubicacion, marca, nombre, modelo, serie, fechadecompra, valor, tiempofinaldegarantia, estado, tipoinv, tipdoc, tippro, observaciones, tipo_frecuencia, cantidad_horas) FROM stdin;
\.


--
-- Name: elementoshoja_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('elementoshoja_codigo_seq', 75, true);


--
-- Data for Name: elementosinhoja; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY elementosinhoja (codigo, categoria, ubicacion, fechaingreso, cantidad, valor_unitario, referencia, buenos, malos, regulares, nombre, cantidaddebaja) FROM stdin;
\.


--
-- Name: elementosinhoja_codigo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('elementosinhoja_codigo_seq', 1, true);


--
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY empresa (nit, representante_legal, razon_social, direccion_empresa, telefono_empresa, email_contacto) FROM stdin;
1	aaa                                               	aaa                                                                                                                                                                                                     	aaa                                                                                                 	aaa       	aaa                 
2	aa                                                	a                                                                                                                                                                                                       	d                                                                                                   	d         	d                   
6	empresa1                                          	a                                                                                                                                                                                                       	a                                                                                                   	a         	a                   
10	s                                                 	empresa1                                                                                                                                                                                                	a                                                                                                   	a         	a                   
\.


--
-- Data for Name: encuestas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY encuestas (id, titulo, fecha, publicadopor, activa, tipo) FROM stdin;
\.


--
-- Name: encuestas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('encuestas_id_seq', 4, true);


--
-- Name: encuestas_id_seq1; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('encuestas_id_seq1', 20, true);


--
-- Data for Name: enlaces; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY enlaces (idenlace, enlace, destino, publicadopor) FROM stdin;
\.


--
-- Name: enlaces_idenlace_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('enlaces_idenlace_seq', 11, true);


--
-- Data for Name: equipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY equipo (nombreequipo, codubicacion, ip, dirmac, codequipo, obsequipo) FROM stdin;
\.


--
-- Data for Name: estudiante; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY estudiante (codestudiante, cedula, mail, especialidad, otrosestudios, edad, codprograma) FROM stdin;
12	12	gato@co.co                                        	323                                               	1234                                              	12	12
1	1	gato@co.co                                        	323                                               	1234                                              	12	12
1	1	gato@co.co                                        	323                                               	1234                                              	12	12
1	121	1@w                                               	1                                                 	1                                                 	1	1
1	121	1@w                                               	1                                                 	1                                                 	1	1
2	121	1@w                                               	1                                                 	1                                                 	1	1
3	22	1@3w                                              	13                                                	13                                                	13	1
\.


--
-- Data for Name: estudianteMateria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "estudianteMateria" (codestudiante, codmateria, year, periodo, nota) FROM stdin;
\.


--
-- Data for Name: evento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY evento (codevento, tituloevento, descevento, fechaevento, lugarevento, organizadopor, cedularesponsable, url, publicadoen, urlexterno) FROM stdin;
\.


--
-- Name: evento_codEvento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('"evento_codEvento_seq"', 34, true);


--
-- Data for Name: fabricante; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY fabricante (codfabricante, nombrefabricante) FROM stdin;
\.


--
-- Data for Name: facultad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY facultad (nombrefacultad, descfacultad, codfacultad) FROM stdin;
\.


--
-- Data for Name: inv_convocatorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_convocatorias (numero_convocatoria, estado, titulo_convocatoria, fecha_apertura, fecha_cierre, cuantia, descripcion_convocatoria, email, telefono_contacto, pagina_convocatoria, archivo_convocatoria, archivo_imagen, convocatoria_dirigida, estado1) FROM stdin;
\.


--
-- Data for Name: inv_evento_noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_evento_noticias (id_evento, titulo_evento, tipo, descripcion, enlace_documento, fecha) FROM stdin;
\.


--
-- Name: inv_evento_noticias_id_evento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_evento_noticias_id_evento_seq', 1, false);


--
-- Data for Name: inv_financiacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_financiacion (id_financiacion, inv_codigo_proyecto, inv_nit_empresa, fecha, valor_financiado, descripcion_financiamiento, modo_financiamiento) FROM stdin;
\.


--
-- Name: inv_financiacion_id_financiacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_financiacion_id_financiacion_seq', 1, false);


--
-- Data for Name: inv_grupos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_grupos (codigo_grupo, inv_tipo_grupos, nombre_grupo, director_grupo, inv_unidad_academica, categoria, objetivos, ano_creacion, email, telefono, direccion_grupo, pagina_web, ruta_afiche, link_gruplac, imagen1, imagen2, logo_grupo, estado_activacion) FROM stdin;
2	1	grupo3	63345889	2	A1	maamamam	2015-03-02	jj@h.com	6678976	Calle 17 #20-34 barrio las bolitas	www.pagina1.com.com						1
3	1	grupo34	1	1	A1	maamamam	2015-03-02	jj@h.com	6678976	Calle 17 #20-34 barrio las bolitas	www.pagina1.com.com						1
1	1	Desarrollo Humano y Apropiación de TIC	63345889	1	A1	Plan de trabajo: Línea 1: Gestión Empresarial. A corto plazo: se pretende generar aportes significativos en la búsqueda de soluciones novedosas, que propendan por el mejoramiento de las condiciones de vida y el crecimiento económico de la región, desarrollando investigaciones que generen impacto en cuanto al crecimiento económico y desarrollo sostenible, especialmente en el departamento de Boyacá y Casanare. A mediano plazo se abordarán estudios sobre cadenas de producción, clúster empresariales y formas de hacer alianzas estratégicas para la competitividad. Línea 2: Estudios Sectoriales. A corto plazo: Desarrollar las potencialidades estructurales de cada uno de los sectores para promover el análisis de las diferentes organizaciones, caracterizando la gestión de las empresas en aspectos contables, administrativos, fiscales y formas de control como modelo administrativo. A mediano plazo: se propone elaborar herramientas de apoyo a la gestión de las empresas como la presentación de instrumentos para la elaboración y seguimiento de los planes de negocios, así como de control de gestión. A largo plazo se espera contar con productos resultantes la gestión y evaluación aplicados a distintos sectores en el ámbito empresarial y de producción, tanto a nivel nacional como internacional. Línea 3: Administración y gestión de proyectos. A corto plazo: Se proyecta desarrollar proyectos en los sectores productivos y empresariales de Boyacá y Casanare, en temas financieros, tributarios, de comercio internacional, mercadeo y gerencia de proyectos, promoviendo el desarrollo empresarial y productivo de las diferentes organizaciones. A mediano plazo se ha propuesto la elaboración de herramientas de gestión, apoyo, evaluación y control de los proyectos aplicados. Línea 3: Contabililidad y auditoria. Esta línea pretende dar una mirada a los estandares internacionales que por ley se imponen en Colombia desde el ámbito mundial, como resultado del proceso de globalización, revisando lo \r\nEstado del arte: El entorno empresarial actual tiene un proceso dinámico y continuo de adaptación al nuevo sistema de mercado, donde la competencia y los cambios tecnológicos son la expresión de una creciente complejidad. Para que las empresas puedan competir exitosamente en esta nueva generación, se hace necesario implementar sistemas de medición que permitan observar, detectar y tomar los correctivos o pautas por seguir al evaluar la gestión empresarial, tanto administrativa[26].isCheckedcked=on 	2015-03-02	jj@h.com	6678976	Calle 17 #20-34 barrio las bolitas	www.pagina1.com.com	Hoja de contacto-006 copia (1).jpg		Hoja de contacto-006 copia (2).jpg	Hoja de contacto-006 copia.jpg	Hoja de contacto-003 copia.jpg	1
\.


--
-- Name: inv_grupos_codigo_grupo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_grupos_codigo_grupo_seq', 3, true);


--
-- Data for Name: inv_investigadores_externos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_investigadores_externos (codinv_ext, cedula_persona, nit, codperfil, profesion, codconvocatoria, nombreconvocatoria, numerocontrato, fecha_inicio, fecha_fin, link_cvlac) FROM stdin;
\.


--
-- Name: inv_investigadores_externos_codinv_ext_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_investigadores_externos_codinv_ext_seq', 1, false);


--
-- Data for Name: inv_linea_grupos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_linea_grupos (id_linea_grupos, inv_codigo_grupo, inv_id_linea) FROM stdin;
1	2	4
\.


--
-- Name: inv_linea_grupos_id_linea_grupos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_linea_grupos_id_linea_grupos_seq', 1, true);


--
-- Data for Name: inv_lineas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_lineas (id_lineas, inv_unidad_academica, nombre_linea, definicion_linea, coordinador_linea, objetivo_estudio, objetivo_linea, ruta_archivo, foto_linea, estado) FROM stdin;
4	1	Teleinformatica	jajajajajjaja	1	mmxmxm	mxmxmms	\N	"Software-Penguins.jpg"	1
\.


--
-- Name: inv_lineas_id_lineas_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_lineas_id_lineas_seq', 4, true);


--
-- Data for Name: inv_participacion_grupos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_participacion_grupos (id_participacion_grupos, inv_codigo_grupo, cedula_persona) FROM stdin;
1	1	63345889
2	2	63345889
\.


--
-- Name: inv_participacion_grupos_id_participacion_grupos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_participacion_grupos_id_participacion_grupos_seq', 2, true);


--
-- Data for Name: inv_participacion_productos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_participacion_productos (id_participacion_productos, inv_codigo_grupo, inv_codigo_producto, cedula_persona) FROM stdin;
1	1	1	63345889
\.


--
-- Name: inv_participacion_productos_id_participacion_productos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_participacion_productos_id_participacion_productos_seq', 1, true);


--
-- Data for Name: inv_participacion_proyectos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_participacion_proyectos (id_participacion_proyectos, tipo_investigador, inv_codigo_proyecto, cedula_persona, dedicacion_tiempo) FROM stdin;
\.


--
-- Name: inv_participacion_proyectos_id_participacion_proyectos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_participacion_proyectos_id_participacion_proyectos_seq', 1, false);


--
-- Data for Name: inv_periodos_academicos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_periodos_academicos (codigo_periodo, ano, periodo, fecha_inicio, fecha_fin) FROM stdin;
\.


--
-- Name: inv_periodos_academicos_codigo_periodo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_periodos_academicos_codigo_periodo_seq', 1, false);


--
-- Data for Name: inv_productos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_productos (codigo_producto, inv_codigo_grupo, inv_id_linea, inv_subtipo_producto, inv_nit, nombre_producto, observaciones_producto, fecha_producto, reconocimiento_producto, observaciones_soporte, soporte_producto, tipo_soporte, foto_producto) FROM stdin;
1	1	4	1	1	producto1	mzmzmzmsmsmamsmsm	2015-03-02	ansmsmsmsnans	smsmsmms	Hoja de contacto-006 copia (2).jpg	mzmzmms	Hoja de contacto-006 copia (1).jpg
\.


--
-- Name: inv_productos_codigo_producto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_productos_codigo_producto_seq', 1, true);


--
-- Data for Name: inv_proyectos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_proyectos (codigo_proyecto, inv_numero_convocatoria, inv_id_linea, inv_codigo_grupo, nombre_proyecto, objetivo_general, archivo_actainicio, archivo_propuesta, informe_final, fecha_proyecto, grupo_auxiliar, estado_proyecto) FROM stdin;
\.


--
-- Name: inv_proyectos_codigo_proyecto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_proyectos_codigo_proyecto_seq', 1, false);


--
-- Data for Name: inv_sublineas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_sublineas (id_sublinea, inv_id_linea, nombre_sublinea, estado, descripcion_sublinea, estado1) FROM stdin;
\.


--
-- Name: inv_sublineas_id_sublinea_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_sublineas_id_sublinea_seq', 1, false);


--
-- Data for Name: inv_subtipo_productos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_subtipo_productos (id_subtipo_producto, inv_id_tipo_producto, nombre_subtipo_producto, descripcion_subtipo_producto, estado) FROM stdin;
1	1	subtipo1 producto	smsmmsms	1
\.


--
-- Name: inv_subtipo_productos_id_subtipo_producto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_subtipo_productos_id_subtipo_producto_seq', 1, true);


--
-- Data for Name: inv_tipo_grupos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_tipo_grupos (id, tipo_grupo, estado) FROM stdin;
1	Estudio 	1
\.


--
-- Name: inv_tipo_grupos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_tipo_grupos_id_seq', 1, true);


--
-- Data for Name: inv_tipo_productos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_tipo_productos (id_tipo_producto, nombre_tipo_producto, descripcion_producto, estado) FROM stdin;
1	Nuevo conocimiento		1
\.


--
-- Name: inv_tipo_productos_id_tipo_producto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_tipo_productos_id_tipo_producto_seq', 1, true);


--
-- Data for Name: inv_unidades_academicas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY inv_unidades_academicas (id_unidad, nombre_unidad, inv_cedula_coordinador, descripcion) FROM stdin;
1	Escuela de ingenieria	1121889	                    smmsms
2	Departamento de Biologia y Quimica	63345889	jsjsjsjs sjjsjsjjs
\.


--
-- Name: inv_unidades_academicas_id_unidad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('inv_unidades_academicas_id_unidad_seq', 2, true);


--
-- Name: linea_cod_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('linea_cod_seq', 96, true);


--
-- Data for Name: perfil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY perfil (codperfil, nombreperfil, descperfil) FROM stdin;
1	Joven investigador            	bla bla
2	Investigador externo          	jjsjsjs
3	Docente                       	kakaka
4	Estudiante                    	kddkd
5	otro                          	dmdmd
\.


--
-- Data for Name: persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY persona (cedula, nombre1, direccion, telefono, celular, apellido1, nombre2, apellido2, mail, clavep, fecha_perfil, foto) FROM stdin;
444	g2	g2                                                                                                  	2         	22        	g2             	g21	g22            	1                                                 	g2dd	2014-11-05 00:00:00	d
212	joh	J                                                                                                   	J         	3         	q              	s	J              	J@SDA                                             	\N	2015-02-02 00:00:00	
2123	joh	J                                                                                                   	J         	3         	q              	s	J              	J@SDA                                             	\N	2015-02-02 00:00:00	
21232	joh	J                                                                                                   	J         	3         	q              	s	J              	J@SDA                                             	\N	2015-02-02 00:00:00	
212324499999	joh	J                                                                                                   	J         	3         	q              	s	J              	J@SDA                                             	\N	2015-02-02 00:00:00	
63345889	andres	calle 20 ·40-108                                                                                    	6657890   	3112298765	camargo        	camilo	maldonado      	correo456@hotmail.com                             	\N	2015-02-14 00:00:00	\N
1	g1	gato@co.co                                                                                          	323       	1234      	apellido       	nombre2	apellido2      	miemal@.com                                       	123	\N	d
22	g2	g2                                                                                                  	2         	22        	g2             	g21	g22            	g2@d                                              	g2dd	2014-11-05 00:00:00	59-Hydrangeas.jpg
1121889	andrea	CALLE 17 NO.12 A 27                                                                                 	6678976   	3204530642	camargo        		               	jj@h.com                                          	\N	2015-02-10 00:00:00	59-Hydrangeas.jpg
\.


--
-- Data for Name: personaperfil; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY personaperfil (codperfil, cedula, clave, username, habilitado, tiempoextra) FROM stdin;
1	22	1                                       	usuario1            	t	2
1	1	1                                       	usuario1            	t	2
3	444	1                                       	usuario4            	t	2
4	1121889	1                                       	usuario4            	t	2
3	63345889	111                                     	usuario7            	t	3
4	212324499999	333                                     	pepito              	t	1
3	22	11                                      	user1               	t	2
\.


--
-- Name: cedula_persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY persona
    ADD CONSTRAINT cedula_persona_pkey PRIMARY KEY (cedula);


--
-- Name: inv_convocatorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_convocatorias
    ADD CONSTRAINT inv_convocatorias_pkey PRIMARY KEY (numero_convocatoria);


--
-- Name: inv_evento_noticias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_evento_noticias
    ADD CONSTRAINT inv_evento_noticias_pkey PRIMARY KEY (id_evento);


--
-- Name: inv_financiacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_financiacion
    ADD CONSTRAINT inv_financiacion_pkey PRIMARY KEY (id_financiacion);


--
-- Name: inv_grupos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_grupos
    ADD CONSTRAINT inv_grupos_pkey PRIMARY KEY (codigo_grupo);


--
-- Name: inv_investigadores_externos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_investigadores_externos
    ADD CONSTRAINT inv_investigadores_externos_pkey PRIMARY KEY (codinv_ext);


--
-- Name: inv_linea_grupos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_linea_grupos
    ADD CONSTRAINT inv_linea_grupos_pkey PRIMARY KEY (id_linea_grupos);


--
-- Name: inv_lineas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_lineas
    ADD CONSTRAINT inv_lineas_pkey PRIMARY KEY (id_lineas);


--
-- Name: inv_participacion_grupos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_participacion_grupos
    ADD CONSTRAINT inv_participacion_grupos_pkey PRIMARY KEY (id_participacion_grupos);


--
-- Name: inv_participacion_productos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_participacion_productos
    ADD CONSTRAINT inv_participacion_productos_pkey PRIMARY KEY (id_participacion_productos);


--
-- Name: inv_participacion_proyectos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_participacion_proyectos
    ADD CONSTRAINT inv_participacion_proyectos_pkey PRIMARY KEY (id_participacion_proyectos);


--
-- Name: inv_periodos_academicos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_periodos_academicos
    ADD CONSTRAINT inv_periodos_academicos_pkey PRIMARY KEY (codigo_periodo);


--
-- Name: inv_productos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_productos
    ADD CONSTRAINT inv_productos_pkey PRIMARY KEY (codigo_producto);


--
-- Name: inv_proyectos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_proyectos
    ADD CONSTRAINT inv_proyectos_pkey PRIMARY KEY (codigo_proyecto);


--
-- Name: inv_sublineas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_sublineas
    ADD CONSTRAINT inv_sublineas_pkey PRIMARY KEY (id_sublinea);


--
-- Name: inv_subtipo_productos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_subtipo_productos
    ADD CONSTRAINT inv_subtipo_productos_pkey PRIMARY KEY (id_subtipo_producto);


--
-- Name: inv_tipo_grupos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_tipo_grupos
    ADD CONSTRAINT inv_tipo_grupos_pkey PRIMARY KEY (id);


--
-- Name: inv_tipo_productos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_tipo_productos
    ADD CONSTRAINT inv_tipo_productos_pkey PRIMARY KEY (id_tipo_producto);


--
-- Name: inv_unidad_academica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY inv_unidades_academicas
    ADD CONSTRAINT inv_unidad_academica_pkey PRIMARY KEY (id_unidad);


--
-- Name: nit_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY empresa
    ADD CONSTRAINT nit_pkey PRIMARY KEY (nit);


--
-- Name: perfil_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfil
    ADD CONSTRAINT perfil_pk PRIMARY KEY (codperfil);


--
-- Name: cedula_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personaperfil
    ADD CONSTRAINT cedula_fk FOREIGN KEY (cedula) REFERENCES persona(cedula);


--
-- Name: cedula_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_proyectos
    ADD CONSTRAINT cedula_persona_fkey FOREIGN KEY (cedula_persona) REFERENCES persona(cedula) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: cedula_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_grupos
    ADD CONSTRAINT cedula_persona_fkey FOREIGN KEY (cedula_persona) REFERENCES persona(cedula) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: cedula_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_productos
    ADD CONSTRAINT cedula_persona_fkey FOREIGN KEY (cedula_persona) REFERENCES persona(cedula) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: codperfil_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personaperfil
    ADD CONSTRAINT codperfil_fk FOREIGN KEY (codperfil) REFERENCES perfil(codperfil);


--
-- Name: inv_cedula_coordinador_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_unidades_academicas
    ADD CONSTRAINT inv_cedula_coordinador_fkey FOREIGN KEY (inv_cedula_coordinador) REFERENCES persona(cedula) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_cedula_persona_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_investigadores_externos
    ADD CONSTRAINT inv_cedula_persona_fkey FOREIGN KEY (cedula_persona) REFERENCES persona(cedula) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_codigo_grupo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_proyectos
    ADD CONSTRAINT inv_codigo_grupo_fkey FOREIGN KEY (inv_codigo_grupo) REFERENCES inv_grupos(codigo_grupo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_codigo_grupo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_productos
    ADD CONSTRAINT inv_codigo_grupo_fkey FOREIGN KEY (inv_codigo_grupo) REFERENCES inv_grupos(codigo_grupo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_codigo_grupo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_grupos
    ADD CONSTRAINT inv_codigo_grupo_fkey FOREIGN KEY (inv_codigo_grupo) REFERENCES inv_grupos(codigo_grupo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_codigo_grupo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_productos
    ADD CONSTRAINT inv_codigo_grupo_fkey FOREIGN KEY (inv_codigo_grupo) REFERENCES inv_grupos(codigo_grupo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_codigo_grupog_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_linea_grupos
    ADD CONSTRAINT inv_codigo_grupog_fkey FOREIGN KEY (inv_codigo_grupo) REFERENCES inv_grupos(codigo_grupo) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_codigo_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_productos
    ADD CONSTRAINT inv_codigo_producto_fkey FOREIGN KEY (inv_codigo_producto) REFERENCES inv_productos(codigo_producto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_codigo_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_financiacion
    ADD CONSTRAINT inv_codigo_proyecto_fkey FOREIGN KEY (inv_codigo_proyecto) REFERENCES inv_proyectos(codigo_proyecto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_codigo_proyecto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_participacion_proyectos
    ADD CONSTRAINT inv_codigo_proyecto_fkey FOREIGN KEY (inv_codigo_proyecto) REFERENCES inv_proyectos(codigo_proyecto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_codperfil_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_investigadores_externos
    ADD CONSTRAINT inv_codperfil_fkey FOREIGN KEY (codperfil) REFERENCES perfil(codperfil) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_id_linea_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_sublineas
    ADD CONSTRAINT inv_id_linea_fkey FOREIGN KEY (inv_id_linea) REFERENCES inv_lineas(id_lineas) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_id_linea_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_proyectos
    ADD CONSTRAINT inv_id_linea_fkey FOREIGN KEY (inv_id_linea) REFERENCES inv_lineas(id_lineas) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_id_linea_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_productos
    ADD CONSTRAINT inv_id_linea_fkey FOREIGN KEY (inv_id_linea) REFERENCES inv_lineas(id_lineas) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_id_lineag_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_linea_grupos
    ADD CONSTRAINT inv_id_lineag_fkey FOREIGN KEY (inv_id_linea) REFERENCES inv_lineas(id_lineas) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_id_tipo_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_subtipo_productos
    ADD CONSTRAINT inv_id_tipo_producto_fkey FOREIGN KEY (inv_id_tipo_producto) REFERENCES inv_tipo_productos(id_tipo_producto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_nit_empresa_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_financiacion
    ADD CONSTRAINT inv_nit_empresa_fkey FOREIGN KEY (inv_nit_empresa) REFERENCES empresa(nit) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_nit_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_productos
    ADD CONSTRAINT inv_nit_fkey FOREIGN KEY (inv_nit) REFERENCES empresa(nit) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_numero_convocatoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_proyectos
    ADD CONSTRAINT inv_numero_convocatoria_fkey FOREIGN KEY (inv_numero_convocatoria) REFERENCES inv_convocatorias(numero_convocatoria) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_subtipo_producto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_productos
    ADD CONSTRAINT inv_subtipo_producto_fkey FOREIGN KEY (inv_subtipo_producto) REFERENCES inv_subtipo_productos(id_subtipo_producto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: inv_tipo_grupos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY inv_grupos
    ADD CONSTRAINT inv_tipo_grupos_fkey FOREIGN KEY (inv_tipo_grupos) REFERENCES inv_tipo_grupos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

